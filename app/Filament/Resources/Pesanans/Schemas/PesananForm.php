<?php

namespace App\Filament\Resources\Pesanans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pelanggan_id')
                    ->label('Pelanggan')
                    ->relationship('pelanggan', 'nama')
                    ->required()
                    ->searchable(),

                Select::make('pegawai_id')
                    ->label('Pegawai (Kasir)')
                    ->relationship('pegawai', 'nama')
                    ->required()
                    ->searchable(),

                DateTimePicker::make('diterima_pada')
                    ->label('Diterima Pada')
                    ->required()
                    ->default(now()),

                DateTimePicker::make('estimasi_selesai')
                    ->label('Estimasi Selesai')
                    ->required()
                    ->after('diterima_pada'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'baru' => 'Baru',
                        'proses' => 'Proses',
                        'selesai' => 'Selesai',
                        'diambil' => 'Diambil',
                    ])
                    ->required()
                    ->default('baru'),
            ]);
    }
}