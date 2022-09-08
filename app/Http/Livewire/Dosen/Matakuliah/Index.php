<?php

namespace App\Http\Livewire\Dosen\Matakuliah;

use App\Models\Matakuliah;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['reloadComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.dosen.matakuliah.index', [
            'matakuliahs' => Matakuliah::latest()->paginate(12)
        ]);
    }

    public function edit($id)
    {
        $this->emit('passIdDosen', $id);
        $this->dispatchBrowserEvent('backTop');
    }

    public function delete($id)
    {
        Matakuliah::find($id)->delete();
        $this->emitSelf('reloadComponent');
    }
}
