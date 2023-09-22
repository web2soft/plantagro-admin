<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use App\Filament\Resources\QuoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuote extends EditRecord
{
    protected static string $resource = QuoteResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['wheat_price'] = str_replace('.', '', $data['wheat_price']);
        $data['wheat_price'] = str_replace(',', '.', $data['wheat_price']);

        $data['corn_price'] = str_replace('.', '', $data['corn_price']);
        $data['corn_price'] = str_replace(',', '.', $data['corn_price']);

        $data['soybean_price'] = str_replace('.', '', $data['soybean_price']);
        $data['soybean_price'] = str_replace(',', '.', $data['soybean_price']);

        $data['bean_price'] = str_replace('.', '', $data['bean_price']);
        $data['bean_price'] = str_replace(',', '.', $data['bean_price']);

        $data['dollar_price'] = str_replace('.', '', $data['dollar_price']);
        $data['dollar_price'] = str_replace(',', '.', $data['dollar_price']);
        
        return $data;
    }
}
