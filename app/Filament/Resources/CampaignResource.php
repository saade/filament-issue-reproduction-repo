<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignResource\Pages;
use App\Filament\Resources\CampaignResource\Pages\EditCampaign;
use App\Models\Campaign;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'ISSUE #3451';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->default('The error occurs while editing, creating is fine.'),

                    Forms\Components\Repeater::make('banners')
                        ->relationship('banners')
                        ->schema([
                            Forms\Components\FileUpload::make('image_url'),
                        /**
                         *  Uncomment this to make it save as array
                         *  You'll need to add a $cast to the model to make it work
                         * */
                            // ->multiple(),
                        ]),

                    Forms\Components\Placeholder::make('Try to save the form, it will fail, unless FileUpload is ->multiple().')
                        ->visibleOn(EditCampaign::class),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
