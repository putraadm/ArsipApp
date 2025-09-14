@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
        <div class="flex items-center justify-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-info-circle text-white text-2xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Tentang Aplikasi</h1>
                <p class="text-gray-600">Informasi tentang pengembang dan aplikasi arsip surat</p>
            </div>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-shadow">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6">
            <h2 class="text-2xl font-bold text-white text-center">Pengembang Aplikasi</h2>
        </div>

        <div class="p-8">
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                <!-- Profile Photo -->
                <div class="flex-shrink-0">
                    <div class="w-48 h-48 rounded-xl overflow-hidden shadow-lg border-4 border-white">
                        <img src="{{ asset('assets/images/MyPhoto.jpg') }}" alt="Profile Photo"
                             class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="flex-1 text-center md:text-left">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Putra Adimulya Walizhafran</h3>
                            <p class="text-gray-600">Mahasiswa D3-Manajemen Informatika</p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-id-card text-blue-600 w-5 mr-3"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">NIM</p>
                                        <p class="text-gray-600">2331730109</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-graduation-cap text-blue-600 w-5 mr-3"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">Program Studi</p>
                                        <p class="text-gray-600">D3-Manajemen Informatika</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-blue-600 w-5 mr-3"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">Tanggal Pembuatan</p>
                                        <p class="text-gray-600">24 Oktober 2023</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-code text-blue-600 w-5 mr-3"></i>
                                    <div>
                                        <p class="font-semibold text-gray-800">Teknologi</p>
                                        <p class="text-gray-600">Laravel & Tailwind CSS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- App Info -->
        <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
            <div class="text-center">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Aplikasi Arsip Surat</h4>
                <p class="text-gray-600 text-sm max-w-2xl mx-auto">
                    Sistem manajemen arsip surat digital yang memudahkan pengelolaan dan penyimpanan dokumen penting
                    dengan fitur pencarian, kategorisasi, dan pengelolaan file PDF.
                </p>
                <div class="flex justify-center space-x-4 mt-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-file-pdf mr-2"></i>
                        PDF Support
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <i class="fas fa-search mr-2"></i>
                        Pencarian Cepat
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                        <i class="fas fa-tags mr-2"></i>
                        Kategorisasi
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
