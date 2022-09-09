<?php

namespace App\Http\Livewire\Dosen\Presensi;

use App\Http\Livewire\Mahasiswa\Presensi;
use App\Models\Pertemuan;
use App\Models\Presensi as ModelsPresensi;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $matakuliah_id, $urutan;

    protected $listeners = [
        'reloadTable' => 'passDataFilter',
        'refreshTable' => '$refresh',
    ];

    public function passDataFilter($arrayFilter)
    {
        $this->matakuliah_id = $arrayFilter['matakuliah_id'];
        $this->urutan = $arrayFilter['urutan'];

        $this->emitSelf('refreshTable');
    }

    public function render()
    {
        $presensis = [];

        if ($this->matakuliah_id != null && $this->urutan != null) {
            $pertemuan = Pertemuan::where([
                'matakuliah_id' => $this->matakuliah_id,
                'urutan' => $this->urutan,
            ])->with('presensis')->first();

            if ($pertemuan) {
                $presensis = ModelsPresensi::where('pertemuan_id', $pertemuan->id)->latest()->get();
            }
        }

        return view('livewire.dosen.presensi.table', [
            'presensis' => $presensis,
        ]);
    }
}
