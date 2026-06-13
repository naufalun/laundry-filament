<?php

namespace App\Filament\Resources\Promos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Promo')->searchable()->sortable(),
                TextColumn::make('jenis')->label('Jenis'),
                TextColumn::make('nilai_diskon')->label('Nilai Diskon'),
                TextColumn::make('tanggal_mulai')->label('Mulai')->date(),
                TextColumn::make('tanggal_selesai')->label('Selesai')->date(),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}