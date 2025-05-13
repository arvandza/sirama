@extends('layout.app')
@section('title', 'Data Aspirasi Mahasiswa')
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
                                    Data Aspirasi Mahasiswa
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Data seluruh aspirasi mahasiswa
                                </p>
                            </div>

                            <div>
                                <div class="hs-dropdown [--placement:bottom-right] relative inline-block"
                                    data-hs-dropdown-auto-close="inside">
                                    <button id="hs-as-table-table-filter-dropdown" type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18" />
                                            <path d="M7 12h10" />
                                            <path d="M10 18h4" />
                                        </svg>
                                        Filter
                                        <span class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200">
                                            1
                                        </span>
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="hs-as-table-table-filter-dropdown">
                                        <div class="divide-y divide-gray-200">
                                            <label for="hs-as-filters-dropdown-all" class="flex py-2.5 px-3">
                                                <input type="checkbox"
                                                    class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="hs-as-filters-dropdown-all" checked>
                                                <span class="ms-3 text-sm text-gray-800">All</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-published" class="flex py-2.5 px-3">
                                                <input type="checkbox"
                                                    class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="hs-as-filters-dropdown-published">
                                                <span class="ms-3 text-sm text-gray-800">Published</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-pending" class="flex py-2.5 px-3">
                                                <input type="checkbox"
                                                    class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="hs-as-filters-dropdown-pending">
                                                <span class="ms-3 text-sm text-gray-800">Pending</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
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



                                    <th scope="col" class="px-6 py-3 text-end"></th>
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
                                                data-hs-overlay="#hs-ai-invoice-modal{{ $item->id }}">
                                                <span class="px-6 py-1.5">
                                                    <span
                                                        class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border border-gray-200 font-medium bg-white text-gray-700 shadow-2xs align-middle hover:bg-gray-50 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm">
                                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                            <path
                                                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                        </svg>
                                                        View
                                                    </span>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div id="hs-ai-invoice-modal{{ $item->id }}"
                                        class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                                        role="dialog" tabindex="-1" aria-labelledby="hs-ai-invoice-modal-label">
                                        <div
                                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                            <div
                                                class="relative flex flex-col bg-white shadow-lg rounded-xl pointer-events-auto">
                                                <div
                                                    class="relative overflow-hidden min-h-32 bg-gray-900 text-center rounded-t-xl">
                                                    <!-- Close Button -->
                                                    <div class="absolute top-2 end-2">
                                                        <button type="button"
                                                            class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-white/70 hover:bg-white/10 focus:outline-hidden focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none"
                                                            aria-label="Close"
                                                            data-hs-overlay="#hs-ai-invoice-modal{{ $item->id }}">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="shrink-0 size-4"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M18 6 6 18" />
                                                                <path d="m6 6 12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <!-- End Close Button -->

                                                    <!-- SVG Background Element -->
                                                    <figure class="absolute inset-x-0 bottom-0">
                                                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                                                            x="0px" y="0px" viewBox="0 0 1920 100.1">
                                                            <path fill="currentColor" class="fill-white"
                                                                d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z">
                                                            </path>
                                                        </svg>
                                                    </figure>
                                                    <!-- End SVG Background Element -->
                                                </div>

                                                <div class="relative z-10 -mt-12">
                                                    <!-- Icon -->
                                                    <span
                                                        class="mx-auto flex justify-center items-center size-15.5 rounded-full border border-gray-200 bg-white text-gray-700 shadow-2xs">
                                                        <i data-feather="inbox"></i>
                                                    </span>
                                                    <!-- End Icon -->
                                                </div>

                                                <!-- Body -->
                                                <div class="p-4 sm:p-7 overflow-y-auto">
                                                    <div class="text-center">
                                                        <h3 id="hs-ai-invoice-modal-label"
                                                            class="text-lg font-semibold text-gray-800">
                                                            {{ $item->subjek }}
                                                        </h3>
                                                        <p class="text-sm text-gray-500">
                                                            {{ $item->tanggal }}
                                                        </p>
                                                    </div>

                                                    <!-- Grid -->
                                                    <div
                                                        class="mt-5 sm:mt-10 grid grid-cols-2 sm:grid-cols-2 gap-5 items-center text-center justify-items-center">
                                                        <div>
                                                            <span
                                                                class="block text-xs uppercase text-gray-500">Tujuan</span>
                                                            <span
                                                                class="block text-sm font-medium text-gray-800 capitalize">{{ $item->tujuan }}</span>
                                                        </div>

                                                        <div>
                                                            <span
                                                                class="block text-xs uppercase text-gray-500">Kategori</span>
                                                            <span
                                                                class="block text-sm font-medium text-gray-800 capitalize">{{ $item->kategori }}</span>
                                                        </div>
                                                    </div>
                                                    <!-- End Grid -->

                                                    <div class="mt-5 sm:mt-10">
                                                        <h4 class="text-xs font-semibold uppercase text-gray-800">Isi Pesan
                                                        </h4>

                                                        <ul class="mt-3 flex flex-col">
                                                            <li
                                                                class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border border-gray-200 text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg">
                                                                <div class="flex items-center justify-between w-full">
                                                                    <span>{{ $item->pesan }}</span>

                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <!-- Button -->
                                                    <div class="mt-5 flex justify-end gap-x-2">
                                                        <form action="{{ route('aspirasi.aksi', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="disetujui">
                                                            <button type="submit"
                                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                                <i data-feather="check" class="w-4 h-4"></i>
                                                                Terima
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('aspirasi.aksi', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="ditolak">
                                                            <button type="submit"
                                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                                <i data-feather="x-circle" class="w-4 h-4"></i>
                                                                Tolak
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <!-- End Buttons -->
                                                </div>
                                                <!-- End Body -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                @endforeach


                            </tbody>
                        </table>
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


@endsection
