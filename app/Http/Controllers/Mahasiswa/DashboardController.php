<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Pertemuan;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard', [
            'presensis' => Presensi::where('user_id', Auth::id())->latest()->get()
        ]);
    }

    public function profile()
    {
        return view('mahasiswa.profile');
    }

    public function scan()
    {
        return view('mahasiswa.scan');
    }

    public function presensi($matakuliah_id, $urutan, $kunci)
    {
        $whereArray = [
            'matakuliah_id' => $matakuliah_id,
            'urutan'        => $urutan,
            'kunci'         => $kunci,
        ];

        $pertemuan = Pertemuan::where($whereArray)->first();

        if ($pertemuan) {
            return view('mahasiswa.presensi', [
                'id_pertemuan'  => $pertemuan->id,
                'matakuliah_id' => $matakuliah_id,
                'urutan'        => $urutan,
                'kunci'         => $kunci,
            ]);
        } else {
            abort(404);
        }
    }
}
