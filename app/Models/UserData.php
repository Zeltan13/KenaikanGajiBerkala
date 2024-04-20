<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $table = 'user_data';
    protected $fillable = [
        'id',
        'userId',
        'golonganPangkat',
        'tmtGolongan',
        'tmtJabatan	',
        'statusPegawai',
        'tmtPegawai',
        'masaKerjaTahun',
        'masaKerjaBulan',
    ];
}
