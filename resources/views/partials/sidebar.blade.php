<div id="hs-application-sidebar"
    class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-65 h-full
    hidden
    fixed inset-y-0 start-0 z-60
    bg-white border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
   "
    role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <div class="px-6 pt-4 flex items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold mx-auto">
                <span class="text-[#4880ff]">SI</span><span class="text-[#202224]">RAMA</span>
            </div>
            <!-- End Logo -->

            <div class="hidden lg:block ms-2">

            </div>
        </div>

        <!-- Content -->
        <div
            class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 mt-4">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">
                    <x-sidebaritem href="{{ route('aspirasi.dashboard') }}" label="Dashboard" :active="request()->is('dashboard')">
                        <x-slot:icon>
                            <i data-feather="home" class="w-4 h-4"></i>
                        </x-slot:icon>
                    </x-sidebaritem>
                    <x-sidebaritem href="{{ route('aspirasi.data') }}" label="Aspirasi" :active="request()->is('data-aspirasi')">
                        <x-slot:icon>
                            <i data-feather="list" class="w-4 h-4"></i>
                        </x-slot:icon>
                    </x-sidebaritem>
                    <x-sidebaritem href="{{ route('aspirasi.riwayat') }}" label="Riwayat" :active="request()->is('riwayat-aspirasi')">
                        <x-slot:icon>
                            <i data-feather="archive" class="w-4 h-4"></i>
                        </x-slot:icon>
                    </x-sidebaritem>
                    <li>
                        <div class="border-t border-gray-200 my-2"></div>
                    </li>
                    <x-sidebaritem href="/pengaturan" label="Pengaturan" :active="request()->is('pengaturan')">
                        <x-slot:icon>
                            <i data-feather="settings" class="w-4 h-4"></i>
                        </x-slot:icon>
                    </x-sidebaritem>
                    <x-sidebaritem href="{{ route('logout') }}" label="Keluar" :active="request()->is('logout')">
                        <x-slot:icon>
                            <i data-feather="log-out" class="w-4 h-4"></i>
                        </x-slot:icon>
                    </x-sidebaritem>
                </ul>
            </nav>
        </div>
        <!-- End Content -->
    </div>
</div>
