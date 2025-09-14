@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Arsip Surat</h1>
                <p class="text-gray-600">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-file-alt text-4xl text-blue-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <form method="GET" action="{{ route('letters.index') }}" class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari surat..." value="{{ request('search') }}"
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
            </form>
            <a href="{{ route('letters.create') }}" class="btn-success flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Arsipkan Surat
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-400 mr-3"></i>
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-shadow">
        <div class="overflow-x-auto">
            <table class="w-full table-modern">
                <thead>
                    <tr>
                        <th class="px-6 py-4 text-left">Nomor Surat</th>
                        <th class="px-6 py-4 text-left">Kategori</th>
                        <th class="px-6 py-4 text-left">Judul</th>
                        <th class="px-6 py-4 text-left">Waktu Pengarsipan</th>
                        <th class="px-6 py-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($letters as $letter)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $letter->nomor_surat }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $letter->category->nama_kategori ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $letter->judul }}</td>
                        <td class="px-6 py-4 text-gray-500 text-sm">
                            {{ $letter->waktu_pengarsipan ? \Carbon\Carbon::parse($letter->waktu_pengarsipan)->format('d M Y, H:i') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <form method="POST" action="{{ route('letters.destroy', $letter->id) }}" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-medium transition duration-200 delete-button">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                                <a href="{{ route('letters.download', $letter->id) }}" class="text-center bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm font-medium transition duration-200">
                                    <i class="fas fa-download mr-1"></i> Unduh
                                </a>
                                <a href="{{ route('letters.show', $letter->id) }}" class="text-center bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-medium transition duration-200">
                                    <i class="fas fa-eye mr-1"></i> Lihat
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-file-alt text-gray-300 text-4xl mb-4"></i>
                                <p class="text-gray-500 text-lg">Tidak ada surat ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $letters->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
