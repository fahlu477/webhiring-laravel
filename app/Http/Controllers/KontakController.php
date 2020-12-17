<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Show the application dashboard.`
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('kontak.index');
    }

    /**
     * Show the application dashboard.`
     *
     * @return Renderable
     */
    public function apply(): Renderable
    {
        return view('kontak');
    }
}
