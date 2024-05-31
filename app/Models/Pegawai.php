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
        'kenaikanGajiBerkala',
    ];

    // Check if the user is an admin
    public function isAdmin()
    {
        return $this->roleId === 1; // Assuming roleId 1 represents admin role
    }

    // Check if the user is a regular user
    public function isUser()
    {
        return $this->roleId === 2; // Assuming roleId 2 represents regular user role
    }
}
class User extends Model
{
    use HasFactory;

    // Tentukan field yang bisa diisi
    protected $fillable = [
        'roleId',
        'nip',
        'password',
        'nama',
        'ttl',
    ];

    // Jika Anda menggunakan nama tabel atau primary key yang berbeda, tentukan di sini
    protected $table = 'users';
    protected $primaryKey = 'id';
}
