<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoController extends Controller {
    public function index() {
        $logos = Logo::all();
        return view('logos.index', compact('logos'));
    }
}
