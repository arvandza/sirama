@extends('layout.app')
@section('title', 'Data Aspirasi Mahasiswa')
@section('content')
    <!-- Table Section -->
    <div class="flex-1 p-2">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Data Aspirasi Mahasiswa</h2>
        <!-- Filter Section -->
        <div
            class="h-[70px] inline-flex items-center px-2 py-1 rounded-[10px] border border-[#d4d4d4] bg-[#f8f9fa] shadow-sm text-sm font-semibold text-[#202224] space-x-2">
            <div class="flex items-center justify-center px-4 border-r border-[#d4d4d4]">
                <i data-feather="filter" class="w-4 h-4"></i>
            </div>
            <div class="flex items-center px-4 border-r border-[#d4d4d4]">Filter By</div>
            <div class="relative flex items-center px-4 border-r border-[#d4d4d4]">
                <input type="date" class="bg-transparent text-sm font-semibold focus:outline-none cursor-pointer"
                    value="2025-02-14" />
            </div>
            <div class="relative flex items-center px-4 border-r border-[#d4d4d4]">
                <select class="bg-transparent text-sm font-semibold focus:outline-none cursor-pointer">
                    <option selected>Pilih Kategori</option>
                    <option>Saran</option>
                    <option>Kritik</option>
                    <option>Keluhan</option>
                </select>
            </div>
            <div class="relative flex items-center px-4 border-r border-[#d4d4d4]">
                <select class="bg-transparent text-sm font-semibold focus:outline-none cursor-pointer">
                    <option selected>Status</option>
                    <option>Proses</option>
                    <option>Disetujui</option>
                    <option>Ditolak</option>
                </select>
            </div>
            <div class="flex items-center px-4 text-[#ea0234] hover:text-red-600 cursor-pointer space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9M4 4l5 5" />
                </svg>
                <span>Reset</span>
            </div>
        </div>

        <!-- Table Section -->
        <div class="main-container w-full mt-6 rounded-xl overflow-hidden border border-gray-300 bg-white">
            <table class="min-w-full divide-y divide-gray-200 shadow border border-gray-300 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">SUBJEK</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">TUJUAN</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">TANGGAL</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">TIPE</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">AKSI</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-800">
                    @foreach ($aspirasi as $aspirasis => $item)
                        <tr>
                            <td class="px-4 py-3 font-semibold">000{{ $item->id }}</td>
                            <td class="px-4 py-3 capitalize">{{ $item->subjek }}</td>
                            <td class="px-4 py-3 capitalize">{{ $item->tujuan }}</td>
                            <td class="px-4 py-3 capitalize">{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                            </td>
                            <td class="px-4 py-3 capitalize">{{ $item->kategori }}</td>
                            <td class="px-4 py-3 capitalize">
                                <button
                                    class="inline-flex items-center justify-center w-12 h-6 rounded-lg bg-gray-50 border border-gray-300 cursor-pointer hover:bg-gray-100"
                                    data-hs-overlay="#modal{{ $item->id }}">
                                    <i data-feather="eye" class="w-4 h-4 text-teal-500"></i>
                                </button>
                            </td>
                        </tr>
                        <div id="modal{{ $item->id }}"
                            class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen px-4 py-8">
                                <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6 relative">
                                    <!-- Header -->
                                    <div class="flex items-center justify-between mb-4">
                                        <h2 class="text-xl font-semibold">#ID0001</h2>
                                        <span
                                            class="inline-block bg-teal-500 text-white text-sm px-4 py-1 rounded-full">Kritik</span>
                                    </div>

                                    <!-- Message -->
                                    <textarea disabled
                                        class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded p-4 resize-none focus:outline-none mb-6">Peningkatan fasilitas akademik, kesejahteraan mahasiswa, hingga perbaikan sistem pembelajaran</textarea>

                                    <!-- Action Buttons -->
                                    <div class="flex justify-between">
                                        <form action="{{ route('aspirasi.aksi', $item->id) }}" class="flex-1"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="disetujui">
                                            <button type="submit"
                                                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg shadow-md hover:shadow-lg">
                                                Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('aspirasi.aksi', $item->id) }}" class="flex-1 ml-4"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit"
                                                class="w-full bg-rose-500 hover:bg-rose-600 text-white py-2 rounded-lg shadow-md hover:shadow-lg">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Close Button -->
                                    <button type="button" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600"
                                        data-hs-overlay="#modal{{ $item->id }}">
                                        ✕
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Table Section -->


@endsection
