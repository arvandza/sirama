<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js"
        integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-[240px] h-screen bg-white shadow-lg flex flex-col fixed z-50 overflow-y-auto p-6">
            <!-- Logo -->
            <div class="mb-10 flex justify-center">
                <h1 class="text-2xl font-bold">
                    <span class="text-[#4880ff]">SI</span><span class="text-[#202224]">RAMA</span>
                </h1>
            </div>

            <!-- Menu Items -->
            <nav class="flex flex-col gap-2">
                <a href="/dashboard"
                    class="sidebar-item flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#4A6CF7] hover:text-white transition-colors cursor-pointer"
                    onclick="setActive(this)">
                    <i data-feather="home" class="w-6 h-6 mr-4"></i>
                    <span class="font-medium text-base">Dashboard</span>
                </a>
                <a href="/aspirasi"
                    class="sidebar-item active flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#4A6CF7] hover:text-white transition-colors cursor-pointer"
                    onclick="setActive(this)">
                    <i data-feather="message-square" class="w-6 h-6 mr-4"></i>
                    <span class="font-semibold text-base">Aspirasi</span>
                </a>
                <a href="/riwayat"
                    class="sidebar-item flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#4A6CF7] hover:text-white transition-colors cursor-pointer"
                    onclick="setActive(this)">
                    <i data-feather="clock" class="w-6 h-6 mr-4"></i>
                    <span class="font-semibold text-base">Riwayat</span>
                </a>
                <a href="/settings"
                    class="sidebar-item flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#4A6CF7] hover:text-white transition-colors cursor-pointer"
                    onclick="setActive(this)">
                    <i data-feather="settings" class="w-6 h-6 mr-4"></i>
                    <span class="font-semibold text-base">Settings</span>
                </a>
                <a href="/logout"
                    class="sidebar-item flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-[#4A6CF7] hover:text-white transition-colors cursor-pointer"
                    onclick="setActive(this)">
                    <i data-feather="log-out" class="w-6 h-6 mr-4"></i>
                    <span class="font-semibold text-base">Keluar</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8 ml-[240px]">
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
                        <option>Akademik</option>
                        <option>Non-Akademik</option>
                    </select>
                </div>
                <div class="relative flex items-center px-4 border-r border-[#d4d4d4]">
                    <select class="bg-transparent text-sm font-semibold focus:outline-none cursor-pointer">
                        <option selected>Status</option>
                        <option>Aktif</option>
                        <option>Selesai</option>
                        <option>Batal</option>
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
                        <tr>
                            <td class="px-4 py-3 font-semibold">00001</td>
                            <td class="px-4 py-3">Jadwal kuliah atau ujian</td>
                            <td class="px-4 py-3">Akademik</td>
                            <td class="px-4 py-3">14 Feb 2025</td>
                            <td class="px-4 py-3">Kritik</td>
                            <td class="px-4 py-3">
                                <img src="https://codia-f2c.s3.us-west-1.amazonaws.com/image/2025-05-14/KyFCGqa3RP.png"
                                    alt="Aksi" class="w-6 h-6" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Initialize Feather Icons
        feather.replace();

        // Handle active state
        function setActive(element) {
            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('active');
            });
            element.classList.add('active');
        }
    </script>
</body>

</html>
