@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-edit text-white"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Kategori Surat</h1>
                <p class="text-gray-600">Perbarui informasi kategori yang telah dibuat.</p>
            </div>
        </div>
        <div class="bg-grey-50 border border-grey-200 rounded-lg p-4">
            <div class="flex items-start">
                <i class="fas fa-tag text-grey-400 mt-0.5 mr-3"></i>
                <div>
                    <p class="font-semibold text-gray-800 mb-1">Kategori Saat Ini:</p>
                    <p class="text-sm text-gray-600">{{ $category->nama_kategori }}</p>
                    <p class="text-xs text-gray-500">ID: {{ $category->id }}</p>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
            <div class="flex items-start">
                <i class="fas fa-exclamation-triangle text-red-400 mt-0.5 mr-3"></i>
                <div>
                    <ul class="text-red-700 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg p-6 card-shadow">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-blue-600"></i>Nama Kategori
                </label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                       placeholder="Masukkan nama kategori" required>
            </div>
            <div>
                <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-sticky-note mr-2 text-blue-600"></i>Keterangan
                </label>
                <textarea name="keterangan" id="keterangan" rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-none"
                          placeholder="Deskripsikan kategori ini (opsional)">{{ old('keterangan', $category->keterangan) }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Berikan penjelasan singkat tentang kategori ini.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('categories.index') }}" class="btn-secondary flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <button type="submit" class="btn-primary flex items-center justify-center flex-1">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
