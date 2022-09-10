<?php

namespace App\Http\Livewire\Dosen;

use Livewire\Component;

class Kuota extends Component
{
    public $tersisa = 0;

    protected $listeners = [
        'reloadKuota' => 'passDataKuota',
    ];

    public function passDataKuota($data)
    {
        dd($data);
    }

    public function render()
    {
        return view('livewire.dosen.kuota');
    }
}
