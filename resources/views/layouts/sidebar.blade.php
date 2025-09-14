<div class="flex flex-col w-72 bg-white shadow-lg min-h-screen px-6 pt-6 card-shadow">
    <div class="flex mb-8 space-x-3">
        <div class="flex items-center justify-center mb-4">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-archive text-white text-xl"></i>
            </div>
        </div>
        <div class="flex flex-col">
            <h2 class="text-xl font-bold text-gray-800">Arsip App</h2>
            <p class="text-sm text-gray-500 mt-1">Sistem Manajemen</p>
        </div>
    </div>

    <nav class="space-y-2">
        <a href="{{ route('letters.index') }}" class="flex items-center font-medium px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('letters.index') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
            <i class="fas fa-file-alt w-5 h-5 mr-3"></i>
            Arsip Surat
        </a>
        <a href="{{ route('categories.index') }}" class="flex items-center font-medium px-4 py-3 rounded-lg transition-all duration-200 {{ request()->is('kategori-surat*') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
            <i class="fas fa-tags w-5 h-5 mr-3"></i>
            Kategori Surat
        </a>
        <a href="{{ route('about') }}" class="flex items-center font-medium px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('about') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
            <i class="fas fa-info-circle w-5 h-5 mr-3"></i>
            About
        </a>
    </nav>
    <div class="flex max-w-dvw mx-auto mt-auto mb-3">
        <div class="w-full bg-gradient-to-r from-blue-200 to-gray-100 rounded-lg p-2">
            <p class="text-xs text-gray-600 text-center">&copy; Copyright 2025 Arsip App | by Putra Adimulya Walizhafran</p>
        </div>
    </div>
</div>
