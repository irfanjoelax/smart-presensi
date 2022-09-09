<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function pertemuan()
    {
        return $this->belongsTo('App\Models\Pertemuan');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
