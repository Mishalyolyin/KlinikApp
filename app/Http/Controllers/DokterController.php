<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $jumlahObat = Obat::count();
        // $jumlahResep = Resep::count(); // nanti kita aktifkan setelah ada

        return view('dokter.dashboard', [
            'jumlahObat' => $jumlahObat,
            // 'jumlahResep' => $jumlahResep,
        ]);
    }
}