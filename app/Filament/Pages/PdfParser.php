<?php

namespace App\Filament\Pages;

use App\Services\DigitExtractor;
use App\Services\IciciExtractor;
use App\Services\UnitedInsuranceExtractor;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class PdfParser extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.pdf-parser';
    protected static ?string $title = 'PDF Parser';
    protected static ?string $navigationLabel = 'PDF Parser';
    protected static ?int $navigationSort = 10;

    // Form data properties
    public ?array $data = [];
    public ?array $extractedData = [];
    public bool $showExtractedData = false;

    public $parsedText; 

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
//         $text = <<<HTML
// HTML;
        // $extractor = new IciciExtractor();
        // $r= $extractor->extractData($text);
        // dd($r);

        return $form
            ->schema([
                Forms\Components\Section::make('Upload PDF Document')
                    ->description('Upload a PDF insurance document to extract and view the information')
                    ->schema([
                        Forms\Components\Select::make('insurance_type')
                            ->label('Type of Insurance')
                            ->options([
                                'Digit' => 'Digit',
                                'United' => 'United Insurance',
                            ])
                            ->placeholder('Select Insurance Type')
                            ->validationMessages([
                                'required' => 'Please enter Type of Insurance',
                            ])
                            ->live()
                            ->required(),
                        Forms\Components\FileUpload::make('pdf_file')
                            ->label('Insurance PDF Document')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240) // 10MB max
                            ->required()
                            ->helperText('Upload insurance PDF to automatically extract customer information')
                            ->disk('public')
                            ->directory('temp-uploads')
                            ->columnSpanFull(),
                    ]),

                // Show extracted data section only when data is available
                Forms\Components\Placeholder::make('Extracted Information')
                    ->label('Debug Output')
                    ->content(function () {
                        return '<pre>' . print_r($this->extractedData, true) . '</pre>';
                    }),

                Forms\Components\Placeholder::make('Extracted Information')
                    ->label('Parsed Text')
                    ->content(function () {
                        $html = '<div style="white-space: pre-wrap; word-wrap: break-word;">' 
                            . htmlspecialchars($this->parsedText) 
                            . '</div>';

                        return new HtmlString($html);
                    })
            ])
            ->statePath('data');
    }

    public function parsePdf(): void
    {
        try {
            $data = $this->form->getState();
            $uploadedFile = $data['pdf_file'];
            $insuranceType = $data['insurance_type'];

            if (is_array($uploadedFile)) {
                $uploadedFile = $uploadedFile[0]; // Get first file if array
            }

            // Build the full file path
            $filePath = Storage::disk('public')->path($uploadedFile);

            // Check if file exists
            if (!file_exists($filePath)) {
                throw new \Exception('Uploaded file not found: ' . $filePath);
            }

            // Parse PDF content - you'll need to implement this method
            $parsedData = $this->parsePdfContent($filePath, $insuranceType);

            if ($parsedData) {
                $this->extractedData = $parsedData;
                $this->showExtractedData = true;

                // Clean up temporary file
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                Notification::make()
                    ->title('PDF Parsed Successfully!')
                    ->body('Customer information has been extracted from the PDF.')
                    ->success()
                    ->send();
            } else {
                throw new \Exception('Could not extract customer information from the PDF.');
            }
        } catch (\Exception $e) {
            $this->showExtractedData = false;
            $this->extractedData = [];

            Notification::make()
                ->title('PDF Parsing Failed')
                ->body('Error: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function parseTextOnly(): void
    {
        try {
            $data = $this->form->getState();
            $uploadedFile = $data['pdf_file'];
            $insuranceType = $data['insurance_type'];

            if (is_array($uploadedFile)) {
                $uploadedFile = $uploadedFile[0]; // Get first file if array
            }

            // Build the full file path
            $filePath = Storage::disk('public')->path($uploadedFile);

            // Check if file exists
            if (!file_exists($filePath)) {
                throw new \Exception('Uploaded file not found: ' . $filePath);
            }

            // Parse PDF content - you'll need to implement this method
            $text = \Spatie\PdfToText\Pdf::getText($filePath);

            if ($text) {
                $this->parsedText = $text;

                // Clean up temporary file
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                Notification::make()
                    ->title('PDF Text Parsed Successfully!')
                    ->body('PDF Text Parsed Successfully!')
                    ->success()
                    ->send();
            } else {
                throw new \Exception('Could not parse PDF Text.');
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('PDF Text Not Parsing Failed')
                ->body('Error: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function resetForm(): void
    {
        $this->showExtractedData = false;
        $this->parsedText = '';
        $this->extractedData = [];
        $this->form->fill();

        Notification::make()
            ->title('Form Reset')
            ->body('The form has been reset.')
            ->info()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('parse')
                ->label('Parse PDF')
                ->color('primary')
                ->icon('heroicon-o-document-magnifying-glass')
                ->action('parsePdf'),

            Forms\Components\Actions\Action::make('text')
                ->label('Get PDF Text')
                ->color('primary')
                ->icon('heroicon-o-document-magnifying-glass')
                ->action('parseTextOnly'),

            Forms\Components\Actions\Action::make('reset')
                ->label('Reset')
                ->color('gray')
                ->icon('heroicon-o-arrow-path')
                ->action('resetForm')
                ->visible(fn() => $this->showExtractedData),
        ];
    }

    protected function parsePdfContent(string $filePath, $insuranceType): ?array
    {
        try {
            $text = \Spatie\PdfToText\Pdf::getText($filePath);
            // $text = \Spatie\PdfToText\Pdf::getText($filePath, null, ['layout']);

            switch ($insuranceType) {
                case 'United':
                    $extractor = new UnitedInsuranceExtractor();
                    break;
                case 'Digit':
                    $extractor = new DigitExtractor();
                    break;
                case 'Icici':
                    $extractor = new IciciExtractor();
                    break;
                default:
                    throw new \Exception('This Insurance Company is not yet supported');
            }

            return $extractor->extractData($text);
        } catch (\Exception $e) {
            Log::error('PDF Parsing Error: ' . $e->getMessage());
            return null;
        }
    }
}
