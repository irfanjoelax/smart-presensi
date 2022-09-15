<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Matakuliah;
use App\Models\Pertemuan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use ParagonIE\EasyRSA\KeyPair;
use ParagonIE\EasyRSA\EasyRSA;

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
                'kunci'         => $this->encryptRSA(5),
            ]);
        } else {
            $pertemuan = Pertemuan::create([
                'matakuliah_id' => $this->matakuliah_id,
                'urutan'        => $this->urutan,
                'kunci'         => $this->encryptRSA(5),
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

    public function randomString($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i <= $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    protected function encryptViginere($key, $text)
    {
        $key = strtolower($key);

        $ki = 0;
        $kl = strlen($key);
        $length = strlen($text);

        for ($i = 0; $i < $length; $i++) {
            if (ctype_alpha($text[$i])) {
                if (ctype_upper($text[$i])) {
                    $text[$i] = chr(((ord($key[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
                } else {
                    $text[$i] = chr(((ord($key[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
                }

                $ki++;

                if ($ki >= $kl) {
                    $ki = 0;
                }
            }
        }

        return $text;
    }

    protected function encryptRSA($length)
    {
        $randomString = $this->encryptViginere($this->randomString($length), $this->randomString($length));

        $keyPair = KeyPair::generateKeyPair(4096);

        $secretKey = $keyPair->getPrivateKey();
        $publicKey = $keyPair->getPublicKey();

        $ciphertext = EasyRSA::encrypt($randomString, $publicKey);
        return str_replace(['/', '$', '+', '='], '-', $ciphertext);
    }
}
