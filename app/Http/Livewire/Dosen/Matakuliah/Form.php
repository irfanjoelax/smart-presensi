<?php

namespace App\Http\Livewire\Dosen\Matakuliah;

use App\Models\Matakuliah;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    public $idMatakuliah, $nama, $hari, $jam, $kuota;
    public $isEdit = false;

    protected $listeners = ['passIdDosen' => 'selectData'];

    public function render()
    {
        return view('livewire.dosen.matakuliah.form');
    }

    public function selectData($id)
    {
        $this->isEdit   = true;
        $this->idMatakuliah  = $id;

        $data = Matakuliah::find($id);
        $this->nama = $data->nama;
        $this->hari = $data->hari;
        $this->jam  = $data->jam;
        $this->kuota  = $data->kuota;
    }

    public function submit()
    {
        Matakuliah::updateOrCreate(
            ['id' => $this->idMatakuliah],
            [
                'id'        => $this->idMatakuliah,
                'user_id'   => Auth::id(),
                'nama'      => $this->nama,
                'hari'      => $this->hari,
                'jam'       => $this->jam,
                'kuota'     => $this->kuota,
            ]
        );

        $this->resetForm();
        $this->emit('reloadComponent');
    }

    public function resetForm()
    {
        $this->reset(['idMatakuliah', 'nama', 'hari', 'jam', 'kuota', 'isEdit']);
    }
}
