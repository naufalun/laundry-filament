<?php

namespace App\Filament\Resources\Pembayarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PembayaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pesanan.id')->label('ID Pesanan')->sortable(),
                TextColumn::make('jumlah_bayar')->label('Jumlah Bayar')->money('IDR'),
                TextColumn::make('metode')->label('Metode'),
                TextColumn::make('status')->label('Status')->badge(),
                TextColumn::make('dibayar_pada')->label('Dibayar Pada')->dateTime(),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}