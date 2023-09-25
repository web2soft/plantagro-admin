<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Quote;
use Filament\Forms\Form;
// use App\Models\MainPanel;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\QuoteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\QuoteResource\RelationManagers;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    protected static ?string $modelLabel = 'painel de cotação';
    protected static ?string $pluralModelLabel = 'painel de cotações';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make("Galeria")
                            ->collapsible()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('attachments')
                                    ->label('')
                                    ->imagePreviewHeight('150')
                                    ->reorderable()
                                    ->required()
                                    ->multiple()
                                    // ->acceptedFileTypes(['video/mp4', 'video/avi', 'image/jpg', 'image/jpeg', 'image/png'])
                                    ->maxSize(20000)
                                    ->minFiles(1)
                                    ->maxFiles(10)
                                    ->collection('gallery')
                            ]),
                    ])->columnSpan(1),
                Group::make()
                    ->schema([
                        Section::make("Cotações")
                            ->schema([
                                TextInput::make('wheat_price')
                                    ->label('Valor do trigo')
                                    ->required()
                                    // ->numeric()
                                    // ->inputMode('decimal')
                                    ->afterStateHydrated(function (TextInput $component, $state) {
                                        $component->state(number_format($state, 2, ',', '.'));
                                    })
                                    ->mask(RawJs::make(<<<'JS'
                                        $money($input, ',', '.')
                                    JS)),
                                TextInput::make('corn_price')
                                    ->label('Valor do milho')
                                    ->required()
                                    // ->numeric()
                                    // ->inputMode('decimal')
                                    ->afterStateHydrated(function (TextInput $component, $state) {
                                        $component->state(number_format($state, 2, ',', '.'));
                                    })
                                    ->mask(RawJs::make(<<<'JS'
                                        $money($input, ',', '.')
                                    JS)),
                                
                                TextInput::make('soybean_price')
                                    ->label('Valor do milho')
                                    ->required()
                                    // ->numeric()
                                    // ->inputMode('decimal')
                                    ->afterStateHydrated(function (TextInput $component, $state) {
                                        $component->state(number_format($state, 2, ',', '.'));
                                    })
                                    ->mask(RawJs::make(<<<'JS'
                                        $money($input, ',', '.')
                                    JS)),
                                TextInput::make('bean_price')
                                    ->label('Valor do milho')
                                    ->required()
                                    // ->numeric()
                                    // ->inputMode('decimal')
                                    ->afterStateHydrated(function (TextInput $component, $state) {
                                        $component->state(number_format($state, 2, ',', '.'));
                                    })
                                    ->mask(RawJs::make(<<<'JS'
                                        $money($input, ',', '.')
                                    JS)),
                                TextInput::make('dollar_price')
                                    ->label('Valor do dólar ptax')
                                    ->required()
                                    // ->numeric()
                                    // ->inputMode('decimal')
                                    ->afterStateHydrated(function (TextInput $component, $state) {
                                        $component->state(number_format($state, 2, ',', '.'));
                                    })
                                    ->mask(RawJs::make(<<<'JS'
                                        $money($input, ',', '.')
                                    JS)),
                            ]),
                    ])
                
            ])->columns(2);
    }

    // public static function canCreate(): bool
    // {
    //    return false;
    // }
    // public static function canDelete(Model $record): bool
    // {
    //     return static::can('delete', $record);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuotes::route('/'),
            'create' => Pages\CreateQuote::route('/create'),
            'edit' => Pages\EditQuote::route('/{record}/edit'),
        ];
    }    
}
