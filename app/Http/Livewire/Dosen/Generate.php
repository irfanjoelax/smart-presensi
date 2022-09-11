<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Matakuliah;
use App\Models\Pertemuan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Generate extends Component
{
    public $id_pertemuan, $matakuliah_id, $urutan, $kunci, $tersisa = 0;

    protected $rules = [
        'matakuliah_id' => 'required',
        'urutan' => 'required',
    ];

    protected $messages = [
        'matakuliah_id.required' => 'Matakuliah tidak boleh kosong.',
        'urutan.required' => 'Pertemuan tidak boleh kosong.',
    ];

    public function render()
    {
        return view('livewire.dosen.generate', [
            'matakuliahs' => Matakuliah::where('user_id', Auth::id())->latest()->get()
        ]);
    }

    public function submit()
    {
        $this->validate();

        $matakuliah = Matakuliah::find($this->matakuliah_id);

        $whereArray = [
            'matakuliah_id' => $this->matakuliah_id,
            'urutan'        => $this->urutan,
        ];

        $pertemuan = Pertemuan::where($whereArray)->first();

        if ($pertemuan) {
            $pertemuan->update([
                'matakuliah_id' => $this->matakuliah_id,
                'urutan'        => $this->urutan,
                'kunci'         => $this->encryptRSA(100),
            ]);
        } else {
            $pertemuan = Pertemuan::create([
                'matakuliah_id' => $this->matakuliah_id,
                'urutan'        => $this->urutan,
                'kunci'         => $this->encryptRSA(100),
                'jumlah'        => $matakuliah->kuota
            ]);
        }

        // PASSING DATA KE QR CODE
        $this->id_pertemuan = $pertemuan->id;
        $this->tersisa      = $pertemuan->jumlah;
        $this->kunci        = $pertemuan->kunci;
        $this->urutan       = $this->urutan;
    }

    public function refreshKuota($idPertemuan)
    {
        $pertemuan = Pertemuan::find($idPertemuan);
        $this->tersisa = $pertemuan->jumlah;
    }

    public function resetForm()
    {
        $this->reset([
            'id_pertemuan', 'matakuliah_id', 'urutan', 'kunci', 'tersisa'
        ]);
    }

    protected function encryptRSA($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i <= $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
