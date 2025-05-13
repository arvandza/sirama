@extends('layout.app')
@section('title', 'Riwayat Aspirasi Mahasiswa')
@section('content')
    <!-- Table Section -->
    <div class="max-w-[85rem]  mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">
                                    Riwayat Aspirasi Mahasiswa
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Data riwayat seluruh aspirasi mahasiswa
                                </p>
                            </div>

                            <div>
                                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                    <button id="hs-as-table-table-export-dropdown" type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="7 10 12 15 17 10" />
                                            <line x1="12" x2="12" y1="15" y2="3" />
                                        </svg>
                                        Export
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg p-2 mt-2"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="hs-as-table-table-export-dropdown">
                                        <div class="py-2 first:pt-0 last:pb-0">
                                            <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400">
                                                Options
                                            </span>

                                            <button onclick="printTable()"
                                                class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="6 9 6 2 18 2 18 9" />
                                                    <path
                                                        d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                                    <rect width="12" height="8" x="6" y="14" />
                                                </svg>
                                                Print
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <div id="printArea">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    ID
                                                </span>

                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Subjek
                                                </span>

                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Tujuan
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Tanggal
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Tipe
                                                </span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Status
                                                </span>
                                            </div>
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($aspirasi as $aspirasis => $item)
                                        <tr class="bg-white hover:bg-gray-50">
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="font-mono text-sm text-blue-600">{{ $item->id }}</span></span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span class="text-sm text-gray-600">{{ $item->subjek }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span class="text-sm text-gray-600">{{ $item->tujuan }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span class="text-sm text-gray-600">{{ $item->tanggal }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span class="text-sm text-gray-600">{{ $item->kategori }}</span>
                                                    </span>
                                                </button>
                                            </td>

                                            <td class="size-px whitespace-nowrap">
                                                <button type="button" class="block" aria-haspopup="dialog"
                                                    aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-4 py-2">
                                                        @if ($item->status === 'disetujui')
                                                            <span
                                                                class="inline-block px-3 py-1 text-sm font-medium text-white bg-green-500 rounded-full">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        @elseif ($item->status === 'ditolak')
                                                            <span
                                                                class="inline-block px-3 py-1 text-sm font-medium text-white bg-red-500 rounded-full">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        @else
                                                            <span
                                                                class="inline-block px-3 py-1 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        @endif
                                                    </span>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div>
                                {{-- <p class="text-sm text-gray-600">
                                    <span class="font-semibold text-gray-800">1</span> results
                                </p> --}}
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        <svg class="size-3" width="16" height="16" viewBox="0 0 16 15"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.506 1.64001L4.85953 7.28646C4.66427 7.48172 4.66427 7.79831 4.85953 7.99357L10.506 13.64"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                        Prev
                                    </button>

                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        Next
                                        <svg class="size-3" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.50598 2L10.1524 7.64645C10.3477 7.84171 10.3477 8.15829 10.1524 8.35355L4.50598 14"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->

    <script>
        function printTable() {
            const printContents = document.getElementById('printArea').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = `
                <html>
                    <head>
                        <title>Print Table</title>
                        <style>
                            body { font-family: sans-serif; padding: 20px; }
                            table { width: 100%; border-collapse: collapse; }
                            th, td { border: 1px solid #ddd; padding: 8px; }
                            th { background-color: #f4f4f4; }
                        </style>
                    </head>
                    <body>${printContents}</body>
                </html>
            `;

            window.print();
            document.body.innerHTML = originalContents;
            location.reload(); // reload to restore any JS functionality
        }
    </script>


@endsection
