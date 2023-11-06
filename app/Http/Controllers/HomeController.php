<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('home', [
            'documents' => auth()->user()->userDocuments()->latest()->get()
        ]);
    }
}
