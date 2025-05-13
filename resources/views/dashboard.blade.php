@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="p-5 bg-white rounded-2xl shadow-md flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500 mb-1">Total Aspirasi</p>
                <h2 class="text-3xl font-bold text-gray-900">{{ $totalAspirasi }}</h2>
                <div class="flex items-center mt-2 text-emerald-600 text-sm font-medium">

                </div>
            </div>
            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-indigo-100">
                <i data-feather="archive" class="w-6 h-6 text-indigo-500"></i>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="p-5 bg-white rounded-2xl shadow-md flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500 mb-1">Total Aspirasi Disetujui</p>
                <h2 class="text-3xl font-bold text-gray-900">{{ $totalAspirasiDisetujui }}</h2>
                <div class="flex items-center mt-2 text-red-600 text-sm font-medium">


                </div>
            </div>
            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-green-100">
                <i data-feather="check" class="w-6 h-6 text-green-500"></i>
            </div>
        </div>
        <div class="p-5 bg-white rounded-2xl shadow-md flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500 mb-1">Total Aspirasi Ditolak</p>
                <h2 class="text-3xl font-bold text-gray-900">{{ $totalAspirasiDitolak }}</h2>
                <div class="flex items-center mt-2 text-red-600 text-sm font-medium">


                </div>
            </div>
            <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-red-100">
                <i data-feather="x" class="w-6 h-6 text-red-500"></i>
            </div>
        </div>

        <!-- Tambahkan card lainnya sesuai kebutuhan -->
    </div>

@endsection
