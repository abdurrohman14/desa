<?php

namespace App\Http\Controllers\Lp;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class LpGaleriController extends Controller
{
    public function index() {
        $galeris = Galeri::all();
        return view('lp.galeri', [
            'title' => 'Galeri',
            'galeris' => $galeris
        ]);
    }
}
