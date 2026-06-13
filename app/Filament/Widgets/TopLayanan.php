<?php

namespace App\Filament\Widgets;

use App\Models\Layanan;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TopLayanan extends TableWidget
{
    protected static ?string $heading = 'Layanan Terpopuler';
    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Layanan::query()
                ->withCount('detailPesanan')
                ->orderByDesc('detail_pesanan_count')
                ->limit(5)
            )
            ->columns([
                TextColumn::make('nama')
                    ->label('Layanan'),
                TextColumn::make('harga_per_kg')
                    ->label('Harga/Kg')
                    ->prefix('Rp ')
                    ->numeric(thousandsSeparator: '.'),
                TextColumn::make('detail_pesanan_count')
                    ->label('Jumlah Order')
                    ->suffix(' order')
                    ->sortable(),
            ]);
    }
}