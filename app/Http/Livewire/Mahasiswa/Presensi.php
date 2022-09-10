<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Matakuliah;
use App\Models\Pertemuan;
use App\Models\Presensi as ModelsPresensi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Presensi extends Component
{
    public $id_pertemuan, $matakuliah_id, $urutan;

    public function render()
    {
        return view('livewire.mahasiswa.presensi', [
            'matakuliah' => Matakuliah::with('user')->find($this->matakuliah_id)
        ]);
    }

    public function presensi()
    {
        $whereArray = [
            'user_id' => Auth::id(),
            'pertemuan_id' => $this->id_pertemuan,
        ];

        $presensi = ModelsPresensi::where($whereArray)->first();

        if (!$presensi) {
            ModelsPresensi::create($whereArray);
            $pertemuan = Pertemuan::find($this->id_pertemuan);
            $pertemuan->decrement('jumlah', 1);
            $this->emit('reloadKuota', [
                'tersisa' => $pertemuan->jumlah
            ]);
        }

        return redirect()->to('/mahasiswa/dashboard');
    }
}
