<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class KGBController extends Controller
{
    public function calculateKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan)
{
    $timeToKGB = $this->calculateTimeToKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan);
    $tahunKGB = $this->calculateYearToKGB($masaKerjaTahun, $masaKerjaBulan);

    return view('kgb', compact('timeToKGB', 'tahunKGB'));
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


    private function calculateYearToKGB($masaKerjaTahun, $masaKerjaBulan)
{
    $currentYear = date('Y');
    $tahunKGB = $currentYear + floor(($masaKerjaTahun * 12 + $masaKerjaBulan + $timeToKGB) / 12);

    return $tahunKGB;
}
}

