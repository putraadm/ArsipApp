@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Kategori Surat</h1>
                <p class="text-gray-600">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-tags text-4xl text-blue-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <form method="GET" action="{{ route('categories.index') }}" class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari kategori..." value="{{ request('search') }}"
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
            </form>
            <a href="{{ route('categories.create') }}" class="btn-success flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Kategori Baru
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
                        <th class="px-6 py-4 text-left">ID Kategori</th>
                        <th class="px-6 py-4 text-left">Nama Kategori</th>
                        <th class="px-6 py-4 text-left">Keterangan</th>
                        <th class="px-6 py-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                #{{ $category->id }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-tag text-white text-sm"></i>
                                </div>
                                <span class="font-medium text-gray-900">{{ $category->nama_kategori }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ $category->keterangan ?: '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-medium transition duration-200">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-medium transition duration-200 delete-button">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-tags text-gray-300 text-4xl mb-4"></i>
                                <p class="text-gray-500 text-lg">Tidak ada kategori ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $categories->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
