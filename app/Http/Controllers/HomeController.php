<?php

namespace App\Http\Controllers;
use App\Models\ServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $providers= ServiceProvider::all();
      return view('providers.index', compact('providers'));
    }
}
