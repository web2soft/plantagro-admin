<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ProductResource\RelationManagers;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        // Section::make()
                        //     ->schema([
                        //         TextInput::make('title')
                        //             ->label('Título')
                        //             ->required()
                        //             ->dehydrateStateUsing(fn (string $state): string => ucwords($state)),
                        //         TextInput::make('price')
                        //             ->label('Preço')
                        //             ->required()
                        //             // ->numeric()
                        //             // ->inputMode('decimal')
                        //             ->afterStateHydrated(function (TextInput $component, $state) {
                        //                 $component->state(number_format($state, 2, ',', '.'));
                        //             })
                        //             ->mask(RawJs::make(<<<'JS'
                        //                 $money($input, ',', '.')
                        //             JS)),
                        //     ])->columns(2),
                        Section::make("Galeria")
                            ->collapsible()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('attachments')
                                ->label('')
                                    ->imagePreviewHeight('130')
                                    ->reorderable()
                                    ->required()
                                    ->multiple()
                                    // ->acceptedFileTypes(['video/mp4', 'video/avi', 'image/jpg', 'image/jpeg', 'image/png'])
                                    ->maxSize(20000)
                                    ->minFiles(1)
                                    ->maxFiles(2)
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
                        // Section::make("Galeria")
                        //     ->schema([
                        //         SpatieMediaLibraryFileUpload::make('gallery')
                        //             ->multiple()
                        //             ->enableReordering()
                        //             ->conversion('thumb')
                        //             ->collection('gallery')
                        //     ])->columnSpan(1),
                    ])
                
                
                
                
                    // ->imagePreviewHeight('850')
    // ->loadingIndicatorPosition('left')
    // ->panelAspectRatio('2:1')
    // ->panelLayout('integrated')
    // ->removeUploadedFileButtonPosition('right')
    // ->uploadButtonPosition('left')
    // ->uploadProgressIndicatorPosition('left')


                // Section::make()->schema([
                //         TextInput::make('name')
                        
                //     ])->columnSpan(1),
                // Section::make()->schema([
                //         TextInput::make('name')
                        
                //     ])->columnSpan(1),
                // // RichEditor::make('content')
                // //     ->columnSpan(2)
                // Grid::make(2)
                //     ->schema([
                //         Section::make()->schema([
                //             TextInput::make('name')
                                
                //                 ])->columnSpan(2),
                //                 Section::make()->schema([
                //                     TextInput::make('name')
                                        
                //                         ])->columnSpan(2),

                //     ])
            ])->columns(2);
    }

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
