<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

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
