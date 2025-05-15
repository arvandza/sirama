@extends('layout.app')
@section('title', 'Riwayat Aspirasi Mahasiswa')
@section('content')
    <!-- Table Section -->
    <div class="flex-1 p-2">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Riwayat Aspirasi Mahasiswa</h2>
        <!-- Filter Section -->
        <div class="flex justify-between items-center w-full mb-4">
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

            <div class="flex space-x-3">
                <button onclick="printTable()"
                    class="inline-flex items-center justify-center w-32 h-10 rounded-xl bg-gray-50 border border-gray-300 cursor-pointer hover:bg-gray-100">
                    <i data-feather="printer" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <!-- Table Section -->
        <div class="main-container w-full mt-6 rounded-xl overflow-hidden border border-gray-300 bg-white" id="printArea">
            <table class="min-w-full divide-y divide-gray-200 shadow border border-gray-300 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">SUBJEK</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">TUJUAN</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">TANGGAL</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">TIPE</th>
                        <th class="px-4 py-3 text-left text-sm font-bold text-gray-700">STATUS</th>
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
                                @if ($item->status == 'disetujui')
                                    <span
                                        class="inline-block bg-[#00B69B] text-white text-xs px-3 py-1 font-medium rounded-full">
                                        {{ $item->status }}
                                    </span>
                                @elseif ($item->status == 'ditolak')
                                    <span class="inline-block bg-red-500 text-white text-xs px-3 py-1 rounded-full">
                                        {{ $item->kategori }}
                                    </span>
                                @else
                                    <span class="inline-block bg-gray-300 text-gray-800 text-xs px-3 py-1 rounded-full">
                                        {{ $item->status }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Table Section -->

    <script>
        function printTable() {
            const printContents = document.getElementById('printArea').innerHTML;

            const win = window.open('', '', 'height=700,width=900');
            win.document.write(`
                <html>
                    <head>
                        <title>Print Table</title>
                        <!-- Include your existing styles -->
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
                        <style>
                            @media print {
                                body {
                                    margin: 1rem;
                                    font-family: 'Inter', sans-serif;
                                }
                            }
    
                            /* Optional: Ensure badge styles don't get stripped */
                            .badge {
                                display: inline-block;
                                font-size: 0.75rem;
                                font-weight: 600;
                                padding: 0.25rem 0.75rem;
                                border-radius: 9999px;
                                color: white;
                            }
    
                            .badge-green { background-color: #00B69B; }
                            .badge-red { background-color: #EF4444; }
                            .badge-gray { background-color: #E5E7EB; color: #111827; }
                        </style>
                    </head>
                    <body>
                        
                        ${printContents}
                    </body>
                </html>
            `);

            win.document.close();
            win.focus();
            setTimeout(() => {
                win.print();
                win.close();
            }, 500);
        }
    </script>


@endsection
