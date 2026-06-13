<?php

namespace App\Filament\Resources\Promos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PromoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Promo')
                    ->required()
                    ->maxLength(100),

                Select::make('jenis')
                    ->label('Jenis Diskon')
                    ->options([
                        'persen' => 'Persen (%)',
                        'nominal' => 'Nominal (Rp)',
                    ])
                    ->required(),

                TextInput::make('nilai_diskon')
                    ->label('Nilai Diskon')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->required(),

                DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->required()
                    ->afterOrEqual('tanggal_mulai'),
            ]);
    }
}