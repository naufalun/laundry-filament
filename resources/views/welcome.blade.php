<!DOCTYPE html>
<html lang="id">
<head>
    
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                        secondary: '#3B82F6',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-blue-700">
                🧺 LaundryKu
            </div>
            <div class="flex gap-6 items-center">
                <a href="#layanan" class="text-gray-600 hover:text-blue-700 font-medium">Layanan</a>
                <a href="#keunggulan" class="text-gray-600 hover:text-blue-700 font-medium">Keunggulan</a>
                <a href="#kontak" class="text-gray-600 hover:text-blue-700 font-medium">Kontak</a>
                <a href="/admin" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 font-medium">
                    Login Admin
                </a>
            </div>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section class="bg-gradient-to-br from-blue-700 to-blue-500 text-white pt-32 pb-24 px-6">
        <div class="max-w-6xl mx-auto flex flex-col items-center text-center">
            <h1 class="text-5xl font-bold mb-6 leading-tight">
                Laundry Bersih,<br>Hidup Lebih Praktis 🫧
            </h1>
            <p class="text-xl text-blue-100 mb-10 max-w-2xl">
                Percayakan kebutuhan laundry Anda kepada kami. Bersih, cepat, dan terpercaya sejak hari pertama.
            </p>
            <a href="#layanan" class="bg-white text-blue-700 font-bold px-8 py-4 rounded-full hover:bg-blue-50 text-lg shadow-lg">
                Lihat Layanan Kami
            </a>
        </div>
    </section>

    {{-- LAYANAN SECTION --}}
    <section id="layanan" class="py-20 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-4">Layanan Kami</h2>
            <p class="text-center text-gray-500 mb-12">Pilihan layanan terbaik untuk kebutuhan laundry Anda</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach(\App\Models\Layanan::all() as $layanan)
                <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
                    <div class="text-4xl mb-4">👕</div>
                    <h3 class="text-xl font-bold text-blue-700 mb-2">{{ $layanan->nama }}</h3>
                    <p class="text-gray-500 mb-4">Estimasi selesai {{ $layanan->estimasi_hari }} hari</p>
                    <div class="text-2xl font-bold text-gray-800">
                        Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}
                        <span class="text-sm font-normal text-gray-500">/kg</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- KEUNGGULAN SECTION --}}
    <section id="keunggulan" class="py-20 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-4">Kenapa Pilih Kami?</h2>
            <p class="text-center text-gray-500 mb-12">Kami berkomitmen memberikan pelayanan terbaik</p>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <div class="text-5xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold mb-2">Cepat</h3>
                    <p class="text-gray-500">Proses pengerjaan cepat dan tepat waktu</p>
                </div>
                <div class="p-6">
                    <div class="text-5xl mb-4">✨</div>
                    <h3 class="text-xl font-bold mb-2">Bersih</h3>
                    <p class="text-gray-500">Hasil cucian bersih dan wangi terjamin</p>
                </div>
                <div class="p-6">
                    <div class="text-5xl mb-4">🛡️</div>
                    <h3 class="text-xl font-bold mb-2">Aman</h3>
                    <p class="text-gray-500">Pakaian Anda aman dan terjaga dengan baik</p>
                </div>
                <div class="p-6">
                    <div class="text-5xl mb-4">💰</div>
                    <h3 class="text-xl font-bold mb-2">Terjangkau</h3>
                    <p class="text-gray-500">Harga bersahabat untuk semua kalangan</p>
                </div>
            </div>
        </div>
    </section>

    {{-- KONTAK SECTION --}}
    <section id="kontak" class="py-20 px-6 bg-blue-700 text-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
            <p class="text-blue-100 mb-8">Kami siap melayani Anda setiap hari</p>
            <div class="flex flex-col md:flex-row justify-center gap-8">
                <div class="flex items-center gap-3 justify-center">
                    <span class="text-2xl">📍</span>
                    <span>Jl. Contoh No. 123, Kota Anda</span>
                </div>
                <div class="flex items-center gap-3 justify-center">
                    <span class="text-2xl">📞</span>
                    <span>0812-3456-7890</span>
                </div>
                <div class="flex items-center gap-3 justify-center">
                    <span class="text-2xl">🕐</span>
                    <span>Senin - Minggu, 07.00 - 21.00</span>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-blue-900 text-blue-200 text-center py-6">
        <p>© {{ date('Y') }} LaundryKu. All rights reserved.</p>
    </footer>

</body>
</html>