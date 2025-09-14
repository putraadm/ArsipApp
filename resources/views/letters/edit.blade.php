@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-edit text-white"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Surat</h1>
                <p class="text-gray-600">Perbarui informasi surat yang telah diarsipkan.</p>
            </div>
        </div>

        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <div class="flex items-start">
                <i class="fas fa-file-pdf text-gray-400 mt-0.5 mr-3"></i>
                <div>
                    <p class="font-semibold text-gray-800 mb-1">File Saat Ini:</p>
                    <p class="text-sm text-gray-600">{{ $letter->judul }}</p>
                    <p class="text-xs text-gray-500">Nomor: {{ $letter->nomor_surat }}</p>
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
        <form action="{{ route('letters.update', $letter->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-hashtag mr-2 text-blue-600"></i>Nomor Surat
                    </label>
                    <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat', $letter->nomor_surat) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                           placeholder="Masukkan nomor surat" required>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-tags mr-2 text-blue-600"></i>Kategori
                    </label>
                    <select name="category_id" id="category_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $letter->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-heading mr-2 text-blue-600"></i>Judul
                </label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $letter->judul) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                       placeholder="Masukkan judul surat" required>
            </div>

            <div>
                <label for="waktu_pengarsipan" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-calendar-alt mr-2 text-blue-600"></i>Waktu Pengarsipan
                </label>
                <input type="datetime-local" name="waktu_pengarsipan" id="waktu_pengarsipan"
                       value="{{ old('waktu_pengarsipan', \Carbon\Carbon::parse($letter->waktu_pengarsipan)->format('Y-m-d\TH:i')) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
            </div>

            <div>
                <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-file-pdf mr-2 text-blue-600"></i>Ganti File (PDF)
                </label>
                <div class="relative">
                    <input type="file" name="file" id="file" accept=".pdf"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti file. Hanya format PDF yang didukung.</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('letters.show', $letter->id) }}" class="btn-secondary flex items-center justify-center">
                    <i class="fas fa-times mr-2"></i>
                    Batal
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
