<?php

namespace App\Filament\Pages;

use App\Services\DigitExtractor;
use App\Services\UnitedInsuranceExtractor;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
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
                Forms\Components\Section::make('Extracted Information')
                    ->description('Information extracted from the uploaded PDF')
                    ->visible(fn() => $this->showExtractedData && !empty($this->extractedData))
                    ->schema($this->getExtractedDataFields()),
            ])
            ->statePath('data');
    }

    protected function getExtractedDataFields(): array
    {
        if (empty($this->extractedData)) {
            return [];
        }

        return [
            Forms\Components\Grid::make(2)
                ->schema([
                    // Customer Information
                    Forms\Components\Fieldset::make('Customer Information')
                        ->schema([
                            Forms\Components\TextInput::make('salutation_id')
                                ->label('Salutation')
                                ->default($this->extractedData['name_prefix'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('first_name')
                                ->label('First Name')
                                ->default($this->extractedData['first_name'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('middle_name')
                                ->label('Middle Name')
                                ->default($this->extractedData['middle_name'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('last_name')
                                ->label('Last Name')
                                ->default($this->extractedData['last_name'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('phone')
                                ->label('Phone')
                                ->default($this->extractedData['phone'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('email')
                                ->label('Email')
                                ->default($this->extractedData['email'] ?? '')
                                ->readOnly(),
                        ]),

                    // Address Information
                    Forms\Components\Fieldset::make('Address Information')
                        ->schema([
                            Forms\Components\Textarea::make('address_1')
                                ->label('Address')
                                ->default($this->extractedData['address'] ?? '')
                                ->readOnly()
                                ->rows(2),
                            Forms\Components\TextInput::make('city_id')
                                ->label('City')
                                ->default($this->extractedData['city'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('state')
                                ->label('State')
                                ->default($this->extractedData['state'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('zipcode')
                                ->label('Pincode')
                                ->default($this->extractedData['pincode'] ?? '')
                                ->readOnly(),
                        ]),
                ]),

            Forms\Components\Grid::make(2)
                ->schema([
                    // Vehicle Information
                    Forms\Components\Fieldset::make('Vehicle Information')
                        ->schema([
                            Forms\Components\TextInput::make('make_id')
                                ->label('Make')
                                ->default($this->extractedData['make'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('vehicle_model')
                                ->label('Model')
                                ->default($this->extractedData['model'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('vehicle_sub_model')
                                ->label('Sub Model')
                                ->default($this->extractedData['sub_model'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('engine_type')
                                ->label('Engine No')
                                ->default($this->extractedData['engineNo'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('chasis')
                                ->label('Chassis No')
                                ->default($this->extractedData['chassisNo'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('cc')
                                ->label('CC')
                                ->default($this->extractedData['cc'] ?? '')
                                ->readOnly(),
                        ]),

                    // Policy Information
                    Forms\Components\Fieldset::make('Policy Information')
                        ->schema([
                            Forms\Components\TextInput::make('policy_number')
                                ->label('Policy Number')
                                ->default($this->extractedData['policy_number'] ?? '')
                                ->readOnly(),
                            Forms\Components\TextInput::make('sum_issured')
                                ->label('Sum Insured')
                                ->default($this->extractedData['sum_insured'] ?? '')
                                ->readOnly(),
                            Forms\Components\DatePicker::make('risk_start_date')
                                ->label('Risk Start Date')
                                ->default($this->extractedData['risk_start_date'] ?? '')
                                ->readOnly(),
                            Forms\Components\DatePicker::make('risk_end_date')
                                ->label('Risk End Date')
                                ->default($this->extractedData['risk_end_date'] ?? '')
                                ->readOnly(),
                            Forms\Components\DatePicker::make('tp_start_date')
                                ->label('TP Start Date')
                                ->default($this->extractedData['tp_start_date'] ?? '')
                                ->readOnly(),
                            Forms\Components\DatePicker::make('tp_end_date')
                                ->label('TP End Date')
                                ->default($this->extractedData['tp_end_date'] ?? '')
                                ->readOnly(),
                        ]),
                ]),
        ];
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

    public function resetForm(): void
    {
        $this->showExtractedData = false;
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

            switch ($insuranceType) {
                case 'United':
                    $extractor = new UnitedInsuranceExtractor();
                    break;
                case 'Digit':
                    $extractor = new DigitExtractor();
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
