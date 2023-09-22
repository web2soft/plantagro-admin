<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use App\Filament\Resources\QuoteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuote extends CreateRecord
{
    protected static string $resource = QuoteResource::class;
    protected static bool $canCreateAnother = false;

    protected function mutateFormDataBeforeCreate(array $data): array
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
