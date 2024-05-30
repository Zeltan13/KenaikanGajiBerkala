<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $userId = Session::get('userId');
        $user = Pegawai::where('id', $userId)->first();
        $datas = Pegawai::where('id', $userId)->first();

        if ($datas) {
            $golonganPangkat = $datas->golonganPangkat;
            $masaKerjaTahun = $datas->masaKerjaTahun;
            $masaKerjaBulan = $datas->masaKerjaBulan;
            $tmtGolongan = Carbon::parse($datas->tmtGolongan);
            $timeToKGB = $this->calculateTimeToKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan);
            $kgbDate = $tmtGolongan->addMonths($timeToKGB);

            $yearsNeeded = intdiv($timeToKGB, 12);
            $monthsNeeded = $timeToKGB % 12;
            $yearKGB = $masaKerjaTahun + $yearsNeeded;
            $monthKGB = $masaKerjaBulan + $monthsNeeded;
            if ($monthKGB>=12){
                $monthKGB -=12;
                $yearKGB += 1;
            }
        } else {
            $kgbDate = null;
            $yearKGB = null;
            $monthKGB = null;
        }

        return view('home', [
            'dataStatisUser' => $user,
            'dataDinamisUser' => $datas,
            'kgbDate' => $kgbDate,
            'yearKGB' => $yearKGB,
            'monthKGB' => $monthKGB
        ]);
    }

    public function admin()
    {
        $userId = Session::get('userId');
        $user = Pegawai::where('id', $userId)->first();
        $datas = Pegawai::where('id', $userId)->first();

        if ($datas) {
            $golonganPangkat = $datas->golonganPangkat;
            $masaKerjaTahun = $datas->masaKerjaTahun;
            $masaKerjaBulan = $datas->masaKerjaBulan;
            $tmtGol = $datas->tmtGolongan;
            $tmtGolongan = Carbon::parse($datas->tmtGolongan);
            $timeToKGB = $this->calculateTimeToKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan);
            $kgbDate = $tmtGolongan->addMonths($timeToKGB);
            
            $yearsNeeded = intdiv($timeToKGB, 12);
            $monthsNeeded = $timeToKGB % 12;
            $yearKGB = $masaKerjaTahun + $yearsNeeded;
            $monthKGB = $masaKerjaBulan + $monthsNeeded;
            if ($monthKGB>=12){
                $monthKGB -=12;
                $yearKGB += 1;
            }
        } else {
            $kgbDate = null;
            $yearKGB = null;
            $monthKGB = null;
        }

        return view('home_admin', [
            'dataStatisUser' => $user,
            'dataDinamisUser' => $datas,
            'kgbDate' => $kgbDate,
            'yearKGB' => $yearKGB,
            'monthKGB' => $monthKGB
        ]);
        
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
