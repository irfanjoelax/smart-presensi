<?php

namespace App\Http\Livewire\Dosen\Presensi;

use App\Models\Matakuliah;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    public $matakuliah_id, $urutan;

    protected $rules = [
        'matakuliah_id' => 'required',
        'urutan' => 'required',
    ];

    public function render()
    {
        return view('livewire.dosen.presensi.form', [
            'matakuliahs' => Matakuliah::where('user_id', Auth::id())->latest()->get()
        ]);
    }

    public function submit()
    {
        $this->validate();

        $this->emit('reloadTable', [
            'matakuliah_id' => $this->matakuliah_id,
            'urutan'        => $this->urutan,
        ]);
    }
}
