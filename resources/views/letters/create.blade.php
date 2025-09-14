@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex items-center mb-4">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-upload text-white"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Arsip Surat >> Unggah</h1>
                <p class="text-gray-600">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
            </div>
        </div>

        <!-- Notes -->
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
            <div class="flex items-start">
                <i class="fas fa-info-circle text-blue-400 mt-0.5 mr-3"></i>
                <div>
                    <p class="font-semibold text-blue-800 mb-1">Catatan:</p>
                    <ul class="text-blue-700 text-sm space-y-1">
                        <li>• Gunakan file berformat PDF</li>
                        <li>• Pastikan file tidak rusak dan dapat dibaca</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Messages -->
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

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-lg p-6 card-shadow">
        <form method="POST" action="{{ route('letters.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Surat -->
                <div>
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-hashtag mr-2 text-blue-600"></i>Nomor Surat
                    </label>
                    <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                           placeholder="Masukkan nomor surat" required>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-tags mr-2 text-blue-600"></i>Kategori
                    </label>
                    <select name="category_id" id="category_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-heading mr-2 text-blue-600"></i>Judul
                </label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                       placeholder="Masukkan judul surat" required>
            </div>

            <!-- Waktu Pengarsipan -->
            <div>
                <label for="waktu_pengarsipan" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-calendar-alt mr-2 text-blue-600"></i>Waktu Pengarsipan
                </label>
                <input type="datetime-local" name="waktu_pengarsipan" id="waktu_pengarsipan"
                       value="{{ old('waktu_pengarsipan', now()->format('Y-m-d\TH:i')) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" required>
            </div>

            <!-- File Upload -->
            <div>
                <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-file-pdf mr-2 text-blue-600"></i>File Surat (PDF)
                </label>
                <div class="relative">
                    <input type="file" name="file" id="file" accept=".pdf"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                           required>
                </div>
                <p class="text-sm text-gray-500 mt-1">Pilih file PDF yang akan diarsipkan</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('letters.index') }}" class="btn-secondary flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <button type="submit" class="btn-primary flex items-center justify-center flex-1">
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
