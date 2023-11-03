<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDgtProcessRequest;
use App\Http\Requests\UpdateDgtProcessRequest;
use App\Models\DgtProcess;
use Illuminate\Contracts\View\View;

class DgtProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @return View
     */
    public function index(): View
    {
        return view('dgt_process.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDgtProcessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DgtProcess $dgtProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DgtProcess $dgtProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDgtProcessRequest $request, DgtProcess $dgtProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DgtProcess $dgtProcess)
    {
        //
    }
}
