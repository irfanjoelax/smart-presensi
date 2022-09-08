<?php

namespace App\Http\Livewire\Dosen\Matakuliah;

use App\Models\Matakuliah;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['reloadComponent' => '$refresh'];

    public function render()
    {
        $matakuliahs = Matakuliah::where('user_id', Auth::id());

        return view('livewire.dosen.matakuliah.index', [
            'matakuliahs' => $matakuliahs->latest()->paginate(12)
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
