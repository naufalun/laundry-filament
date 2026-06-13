<?php

namespace App\Filament\Widgets;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPesanan = Pesanan::count();
        $totalPenghasilan = Pembayaran::where('status', 'lunas')->sum('jumlah_bayar');
        $sedangDiproses = Pesanan::where('status', 'proses')->count();
        $totalPelanggan = Pelanggan::count();

        return [
            Stat::make('Total Pesanan', $totalPesanan)
                ->description('Semua pesanan')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('primary'),

            Stat::make('Penghasilan', 'Rp ' . number_format($totalPenghasilan, 0, ',', '.'))
                ->description('Total pendapatan lunas')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Diproses', $sedangDiproses)
                ->description('Sedang berjalan')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('warning'),

            Stat::make('Pelanggan', $totalPelanggan)
                ->description('Total pelanggan')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
        ];
    }
}