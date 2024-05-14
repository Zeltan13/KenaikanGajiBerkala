<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserData;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $userId = Session::get('userId');
        $user = User::where('id', $userId)->first();
        $datas = UserData::where('userId', $userId)->first();

        if ($datas) {
            $golonganPangkat = $datas->golonganPangkat;
            $masaKerjaTahun = $datas->masaKerjaTahun;
            $masaKerjaBulan = $datas->masaKerjaBulan;
            $tmtGolongan = Carbon::parse($datas->tmtGolongan);
            $timeToKGB = $this->calculateTimeToKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan);
            $kgbDate = $tmtGolongan->addMonths($timeToKGB);
        } else {
            $kgbDate = null;
        }

        return view('home', ['dataStatisUser' => $user, 'dataDinamisUser' => $datas, 'kgbDate' => $kgbDate]);
    }

    private function calculateTimeToKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan)
    {
        $evenMasaKerja = $masaKerjaTahun % 2 === 0;

        if (in_array($golonganPangkat, ['III/a', 'III/b', 'III/c', 'III/d', 'IV/a', 'IV/b', 'IV/c', 'IV/d', 'I/a'])) {
            $timeToKGB = $evenMasaKerja ? 24 : 12;
        } elseif (in_array($golonganPangkat, ['I/b', 'I/c', 'I/d', 'II/a', 'II/b', 'II/c', 'II/d'])) {
            $timeToKGB = $evenMasaKerja ? 12 : 24;
            if (in_array($golonganPangkat, ['I/b', 'I/c', 'I/d', 'II/b', 'II/c', 'II/d'])) {
                $masaKerjaTahun = max(0, $masaKerjaTahun - 3);
            }
            if ($golonganPangkat == 'II/a' && $masaKerjaTahun <= 1) {
                $timeToKGB = 0;
            }
        } else {
            $timeToKGB = 12;
        }

        $timeToKGB -= $masaKerjaBulan;
        return $timeToKGB;
    }
}