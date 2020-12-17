<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Show the application dashboard.`
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('fasilitas.index');
    }

    /**
     * Show the application dashboard.`
     *
     * @return Renderable
     */
    public function apply(): Renderable
    {
        return view('fasilitas');
    }
}
