<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(100),

                TextInput::make('harga_per_kg')
                    ->label('Harga per Kg')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0),

                TextInput::make('estimasi_hari')
                    ->label('Estimasi Hari')
                    ->required()
                    ->numeric()
                    ->suffix('hari')
                    ->minValue(1),
            ]);
    }
}