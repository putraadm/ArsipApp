@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Arsip Surat >> Lihat</h1>
                <p class="text-gray-600">Detail lengkap surat yang telah diarsipkan</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-file-pdf text-4xl text-red-600"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6 card-shadow">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-600"></i>
                    Informasi Surat
                </h2>

                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-hashtag text-blue-600 w-6 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Nomor Surat</p>
                            <p class="font-semibold text-gray-800">{{ $letter->nomor_surat }}</p>
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-tags text-green-600 w-6 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Kategori</p>
                            <p class="font-semibold text-gray-800">{{ $letter->category->nama_kategori ?? 'Tidak ada kategori' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-heading text-purple-600 w-6 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Judul</p>
                            <p class="font-semibold text-gray-800">{{ $letter->judul }}</p>
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <i class="fas fa-calendar-alt text-orange-600 w-6 mr-3"></i>
                        <div>
                            <p class="text-sm text-gray-500">Waktu Pengarsipan</p>
                            <p class="font-semibold text-gray-800">
                                {{ $letter->waktu_pengarsipan ? \Carbon\Carbon::parse($letter->waktu_pengarsipan)->format('d M Y, H:i') : 'Tidak tersedia' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white rounded-xl shadow-lg p-6 card-shadow">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-bolt mr-2 text-yellow-600"></i>
                    Aksi Cepat
                </h3>

                <div class="space-y-3">
                    <a href="{{ route('letters.edit', $letter->id) }}"
                       class="w-full flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Edit / Ganti File
                    </a>

                    <a href="{{ route('letters.download', $letter->id) }}"
                       class="w-full flex items-center justify-center px-4 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition duration-200">
                        <i class="fas fa-download mr-2"></i>
                        Unduh PDF
                    </a>

                    <a href="{{ route('letters.index') }}"
                       class="w-full flex items-center justify-center px-4 py-3 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 mt-6 card-shadow">
                <h4 class="text-md font-bold text-gray-800 mb-3 flex items-center">
                    <i class="fas fa-file-alt mr-2 text-gray-600"></i>
                    Info File
                </h4>

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Format:</span>
                        <span class="font-medium">PDF</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="font-medium text-green-600">Tersimpan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-shadow">
        <div class="bg-gradient-to-r from-red-600 to-red-700 p-4">
            <h3 class="text-lg font-bold text-white flex items-center">
                <i class="fas fa-file-pdf mr-2"></i>
                Pratinjau Dokumen
            </h3>
        </div>

        <div class="p-6">
            <div class="bg-gray-100 rounded-lg overflow-hidden" style="height: 600px;">
                <embed src="{{ route('letters.preview', $letter->id) }}"
                       type="application/pdf"
                       width="100%"
                       height="100%"
                       class="rounded-lg">
            </div>

            <div class="mt-4 text-center">
                <p class="text-gray-600 text-sm">
                    Jika PDF tidak muncul, <a href="{{ route('letters.download', $letter->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">klik di sini untuk mengunduh</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
