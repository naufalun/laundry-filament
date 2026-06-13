<?php

namespace App\Filament\Resources\Pelanggans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PelangganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->maxLength(100),

                TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->required()
                    ->tel()
                    ->maxLength(20),

                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),

                Textarea::make('alamat')
                    ->label('Alamat')
                    ->rows(3)
                    ->maxLength(500),
            ]);
    }
}