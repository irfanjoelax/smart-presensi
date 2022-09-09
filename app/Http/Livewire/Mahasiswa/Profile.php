<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $name, $email, $password;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.mahasiswa.profile');
    }

    public function submit()
    {
        $user = User::find(Auth::id());
        $newPassword = $user->password;

        if ($this->password != null) {
            $newPassword = Hash::make($this->password);
        }

        $user->update([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => $newPassword,
        ]);

        return redirect()->to('/mahasiswa/profile');
    }
}
