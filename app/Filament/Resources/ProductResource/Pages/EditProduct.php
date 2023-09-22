<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Models\Tag;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // dd($data['tags']);
        $data['price'] = str_replace('.', '', $data['price']);
        $data['price'] = str_replace(',', '.', $data['price']);
        // dd((float) $data['price']);
        return $data;
    }

    // protected function handleRecordUpdate(Model $record, array $data): Model
    // {
    //     // dd($data['tags']);
    //     $tags = [];
    //     foreach ($data['tags'] as $tag) {
    //         // dd($tag);
    //         $newTag = Tag::firstOrCreate(['name' => $tag]);
    //         // dd($newTag->id);
    //         $tags[] = $newTag->id;
    //     }
    //     // dd($tags);
    //     $record->tags()->sync($tags);
    //     $record->update($data);
    //     return $record;
    // }

    // protected function afterSave(array $data): void
    // {
    //    dd($this->form->getState());
    // //    $this->record->tags()->attach()
    // } 
    
}
