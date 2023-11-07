<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DropzoneController extends Controller
{
    public function index(): View
    {
        return view('dropzone.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $file = $request->file('file');
        $fileName = time() . '.' . $file->extension();

        $file->move(public_path('uploads'), $fileName);

        return redirect()->back();
    }
}
