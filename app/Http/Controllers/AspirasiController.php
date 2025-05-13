<?php

namespace App\Http\Controllers;

use App\Models\AspirasiModel;
use App\Models\RiwayatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = AspirasiModel::all();
        return view('index', compact('aspirasi'));
    }

    public function riwayatIndex()
    {
        $aspirasi = RiwayatModel::all();
        return view('riwayat', compact('aspirasi'));
    }

    public function dashboard()
    {
        $totalAspirasi = AspirasiModel::count();
        $totalAspirasiDisetujui = AspirasiModel::where('status', 'disetujui')->count();
        $totalAspirasiDitolak = AspirasiModel::where('status', 'ditolak')->count();

        return view('dashboard', compact('totalAspirasi', 'totalAspirasiDisetujui', 'totalAspirasiDitolak'));
    }

    public function store(Request $request)
    {
        //store aspirasi
        DB::beginTransaction();
        try {
            $request->validate([
                'subjek' => 'required|string|max:150',
                'pesan' => 'required|string|max:500',
                'kategori' => 'required|in:saran,kritik,keluhan',
                'tujuan' => 'required|in:sarpras,akademik,pelayanan',
            ]);

            AspirasiModel::create([
                'subjek' => $request->subjek,
                'pesan' => $request->pesan,
                'kategori' => $request->kategori,
                'tujuan' => $request->tujuan,
                'status' => 'proses',
                'tanggal'  => Carbon::now()->toDateString(),
            ]);

            DB::commit();
            toastify()->success('Aspirasi berhasil dikirim!');
            return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            toastify()->error('Terjadi kesalahan');
            return redirect()->route('aspirasi.index')->with('error', 'Terjadi kesalahan');
        }
    }

    public function acceptOrReject(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'status' => 'required|in:disetujui,ditolak'
            ]);

            $aspirasi = AspirasiModel::findOrFail($id);
            $aspirasi->status = $request->status;
            $aspirasi->save();

            RiwayatModel::create([
                'subjek' => $aspirasi->subjek,
                'pesan' => $aspirasi->pesan,
                'tanggal' => $aspirasi->tanggal,
                'kategori' => $aspirasi->kategori,
                'tujuan' => $aspirasi->tujuan,
                'status' => $aspirasi->status
            ]);

            $aspirasi->delete();
            DB::commit();
            toastify()->success('Berhasil ' . $request->status);
            return redirect()->route('aspirasi.data')->with('success', 'Aspirasi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            toastify()->error('Terjadi kesalahan');
            return redirect()->route('aspirasi.data')->with('error', 'Terjadi kesalahan');
        }
    }
}
