<?php

namespace App\Filament\Resources\Pegawais\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PegawaiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Pegawai')
                    ->required()
                    ->maxLength(100),

                TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->required()
                    ->tel()
                    ->maxLength(20),

                Select::make('jabatan')
                    ->label('Jabatan')
                    ->options([
                        'Kasir' => 'Kasir',
                        'Operator Cuci' => 'Operator Cuci',
                        'Operator Setrika' => 'Operator Setrika',
                        'Kurir' => 'Kurir',
                        'Manager' => 'Manager',
                    ])
                    ->required(),

                FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('pegawai')
                    ->nullable(),
            ]);
    }
}