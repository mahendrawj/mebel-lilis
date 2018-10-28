<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CaraPemesananController extends Controller
{
    public function index() {
        return view('carapemesanan.carapemesanan');
    }
}
