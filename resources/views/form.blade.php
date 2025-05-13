<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Aspirasi - SIRAMA</title>
    @toastifyCss
    @toastifyJs
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-[#f8f9fc] min-h-screen">
    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- Header --}}
        <header class="mb-12">
            <div class="text-[36px] font-bold">
                <span class="text-[#4880ff]">SI</span><span class="text-[#202224]">RAMA</span>
            </div>
        </header>

        {{-- Main Content --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

            {{-- Left Section --}}
            <div class="space-y-5">
                <div class="flex items-center gap-2">
                    <div class="w-[22px] h-[2px] bg-[#4880ff] rounded-full"></div>
                    <span class="text-[#4880ff] text-[18px] font-bold uppercase tracking-wide">SIRAMA</span>
                </div>

                <h1 class="text-[#170f49] text-[36px] md:text-[50px] font-bold leading-tight">
                    Isi Formulir untuk mengirimkan Aspirasi
                </h1>

                <p class="text-[#6e6b8f] text-[18px] leading-relaxed">
                    Sistem Aspirasi Mahasiswa - Wujudkan perubahan dengan suara Anda! <strong>SIRAMA</strong> adalah
                    platform resmi untuk menyampaikan aspirasi, keluhan, atau saran terkait akademik, fasilitas, atau
                    kehidupan kampus. Kami menjamin proses yang transparan, cepat, dan aman untuk setiap mahasiswa.
                </p>
            </div>

            {{-- Right Section (Form) --}}
            <div class="bg-white rounded-[24px] shadow-lg p-10">
                <form action="{{ route('aspirasi.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    {{-- Subjek & Kategori --}}
                    <div class="flex flex-col md:flex-row justify-between gap-6 mb-5">
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="subjek" class="text-[#170f49] font-bold text-[18px] mb-2">Subjek</label>
                            <input type="text" name="subjek" id="subjek"
                                class="h-[66px] rounded-[12px] border border-[#eff0f6] shadow px-4 text-[#6f6c8f] placeholder-[#6f6c8f]"
                                placeholder="Masukkan Subjek" required>
                        </div>
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="kategori" class="text-[#170f49] font-bold text-[18px] mb-2">Kategori</label>
                            <select name="kategori" id="kategori"
                                class="h-[66px] rounded-[12px] border border-[#eff0f6] shadow px-4 text-[#6e6b8f]"
                                required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="saran">Saran</option>
                                <option value="kritik">Kritik</option>
                                <option value="keluhan">Keluhan</option>
                            </select>
                        </div>
                    </div>

                    {{-- Tujuan --}}
                    <div class="mb-5">
                        <label for="tujuan" class="text-[#170f49] font-bold text-[18px] mb-2 block">Tujuan
                            Saran/Kritik</label>
                        <select name="tujuan" id="tujuan"
                            class="w-full h-[66px] rounded-[12px] border border-[#eff0f6] shadow px-4 text-[#6e6b8f]"
                            required>
                            <option value="">-- Pilih Tujuan --</option>
                            <option value="sarpras">Sarana dan Prasarana</option>
                            <option value="akademik">Akademik</option>
                            <option value="layanan">Layanan</option>
                        </select>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-5">
                        <label for="deskripsi" class="text-[#170f49] font-bold text-[18px] mb-2 block">Deskripsi
                            Aspirasi</label>
                        <textarea name="pesan" id="deskripsi" rows="5"
                            class="w-full rounded-[8px] border border-[#eff0f6] shadow px-4 py-3 text-[#6e6b8f] placeholder-[#6e6b8f]"
                            placeholder="Tulis deskripsi dari aspirasi anda" required></textarea>
                    </div>

                    {{-- Checkbox --}}
                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="privacy" name="privacy" required
                            class="w-5 h-5 border border-[#d9dbe8] rounded shadow-inner mr-3">
                        <label for="privacy" class="text-[#6e6b8f] text-[14px]">
                            Saya telah membaca dan menerima Kebijakan Privasi.
                        </label>
                    </div>

                    {{-- Submit --}}
                    <div class="flex">
                        <button type="submit"
                            class="w-half bg-[#4880ff] text-white font-medium text-[18px] rounded-[12px] py-[14px] px-[50px] shadow-[0_8px_22px_rgba(74,58,255,0.26)]">
                            KIRIM ASPIRASI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
