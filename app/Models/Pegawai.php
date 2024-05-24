<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Pegawai extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'pegawai';
    protected $fillable = [
        'id',
        'roleId',
        'nip',
        'password',
        'nama',
        'ttl',
        'satuanKerja',
        'golonganPangkat',
        'tmtGolongan',
        'tmtJabatan',
        'statusPegawai',
        'tmtPegawai',
        'masaKerjaTahun',
        'masaKerjaBulan',
    ];
}
