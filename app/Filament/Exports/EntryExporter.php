<?php

namespace App\Filament\Exports;

use App\Models\Entry;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class EntryExporter extends Exporter
{
    protected static ?string $model = Entry::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('business_sourced_by'),
            ExportColumn::make('advisor_name'),
            ExportColumn::make('advisor_code'),
            ExportColumn::make('name'),
            ExportColumn::make('mobile_no'),
            ExportColumn::make('email'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your entry export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
