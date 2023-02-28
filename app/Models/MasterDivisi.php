<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDivisi extends Model
{
    use HasFactory;

    protected $table = 'master_divisi';

    public function listPegawai()
    {
        return $this->hasMany(MasterPegawai::class, 'divisi_id');
    }
}
