<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Matakuliah;
use App\Models\Pertemuan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Generate extends Component
{
    public $idPertemuan, $matakuliah_id, $urutan, $kunci, $tersisa = 0;

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
        $pertemuan = Pertemuan::updateOrCreate(
            [
                'matakuliah_id' => $this->matakuliah_id,
                'urutan'        => $this->urutan,
            ],
            [
                'matakuliah_id' => $this->matakuliah_id,
                'urutan'        => $this->urutan,
                'kunci'         => base64_encode(openssl_random_pseudo_bytes(100)),
                'jumlah'        => $matakuliah->kuota
            ]
        );

        $this->tersisa = $pertemuan->jumlah;
        $this->kunci = $pertemuan->kunci;
        $this->idPertemuan = $pertemuan->id;
    }

    public function resetForm()
    {
        $this->reset([
            'idPertemuan', 'matakuliah_id', 'urutan', 'kunci', 'tersisa'
        ]);
    }
}
