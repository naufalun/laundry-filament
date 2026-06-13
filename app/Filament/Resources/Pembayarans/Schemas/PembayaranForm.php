<?php

namespace App\Filament\Resources\Pembayarans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembayaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pesanan_id')
                    ->label('ID Pesanan')
                    ->relationship('pesanan', 'id')
                    ->required()
                    ->searchable(),

                TextInput::make('jumlah_bayar')
                    ->label('Jumlah Bayar')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0),

                DateTimePicker::make('dibayar_pada')
                    ->label('Dibayar Pada')
                    ->required()
                    ->default(now()),

                Select::make('metode')
                    ->label('Metode Pembayaran')
                    ->options([
                        'tunai' => 'Tunai',
                        'debit' => 'Debit',
                        'qris' => 'QRIS',
                    ])
                    ->required(),

                Select::make('status')
                    ->label('Status Pembayaran')
                    ->options([
                        'belum_lunas' => 'Belum Lunas',
                        'lunas' => 'Lunas',
                    ])
                    ->required()
                    ->default('belum_lunas'),
            ]);
    }
}