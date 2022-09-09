<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Pertemuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function profile()
    {
        return view('mahasiswa.profile');
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
