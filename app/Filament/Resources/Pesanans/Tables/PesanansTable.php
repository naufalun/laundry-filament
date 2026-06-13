<?php

namespace App\Filament\Resources\Pesanans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class PesanansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID Pesanan')->sortable(),
                TextColumn::make('pelanggan.nama')->label('Pelanggan')->searchable(),
                TextColumn::make('pegawai.nama')->label('Pegawai'),
                TextColumn::make('status')->label('Status')->badge(),
                TextColumn::make('diterima_pada')->label('Diterima')->dateTime(),
                TextColumn::make('estimasi_selesai')->label('Estimasi Selesai')->dateTime(),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}