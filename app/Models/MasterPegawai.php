<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPegawai extends Model
{
    use HasFactory;

    protected $table = 'master_pegawai';

    /**
     * belongs to master divisi
     */
    public function divisi()
    {
        return $this->belongsTo(MasterDivisi::class, 'divisi_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(MasterJabatan::class, 'jabatan_id');
    }

    public function kantor()
    {
        return $this->belongsTo(MasterKantor::class, 'kantor_id');
    }
}
