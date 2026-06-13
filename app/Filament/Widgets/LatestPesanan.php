<?php

namespace App\Filament\Widgets;

use App\Models\Pesanan;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestPesanan extends TableWidget
{
    protected static ?string $heading = 'Pesanan Terbaru';
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Pesanan::query()
                ->latest('diterima_pada')
                ->limit(5)
            )
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->prefix('#'),
                TextColumn::make('pelanggan.nama')
                    ->label('Pelanggan')
                    ->searchable(),
                TextColumn::make('detailPesanan.layanan.nama')
                    ->label('Layanan')
                    ->limit(20),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'baru' => 'info',
                        'proses' => 'warning',
                        'selesai' => 'success',
                        'diambil' => 'gray',
                        default => 'gray',
                    }),
                TextColumn::make('diterima_pada')
                    ->label('Diterima')
                    ->dateTime('d M Y'),
            ]);
    }
}