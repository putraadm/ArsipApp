<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Arsip Surat') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/delete-confirmation.js') }}"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-shadow { box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .btn-primary { @apply bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200; }
        .btn-secondary { @apply bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-200; }
        .btn-danger { @apply bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200; }
        .btn-success { @apply bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200; }
        .table-modern th { @apply bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold; }
        .table-modern td { @apply border-b border-gray-200 hover:bg-gray-50 transition duration-150; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="min-h-screen flex">
        @include('layouts.sidebar')
        <main class="flex flex-col flex-1 overflow-auto">
            <div class="p-6 flex-1">
                @yield('content')
            </div>
            <!-- <div class="flex max-w-dvw mx-5 mt-auto mb-2">
                <div class="w-full bg-gradient-to-r from-blue-200 to-gray-100 rounded-lg p-4">
                    <p class="text-xs text-gray-600 text-center">&copy; Copyright 2025 Arsip App | by Putra Adimulya Walizhafran</p>
                </div>
            </div> -->
        </main>
    </div>

    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 id="modalTitle" class="text-lg font-semibold text-gray-900">Konfirmasi Hapus</h3>
                    </div>
                </div>

                <p id="modalMessage" class="text-gray-600 mb-6">
                    Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat dibatalkan.
                </p>

                <div class="flex space-x-3">
                    <button id="cancelDelete" class="flex-1 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-300 transition duration-200">
                        Batal
                    </button>
                    <button id="confirmDelete" class="flex-1 bg-red-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-red-700 transition duration-200">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
