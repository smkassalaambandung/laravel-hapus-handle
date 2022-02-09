<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use RealRashid\SweetAlert\Facades\Alert;

class Pengguna extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::deleting(function($pengguna){
            if($pengguna->buku->count() > 0){
                Alert::error('Gagal Menghapus', 'Data Pengguna Masih Memiliki Buku');
                return false;
            }
        });
    }

    /**
     * Get all of the comments for the Pengguna
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buku()
    {
        return $this->hasMany(Buku::class, 'pengguna_id');
    }
}
