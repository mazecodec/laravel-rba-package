<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDgtProcessRequest;
use App\Http\Requests\UpdateDgtProcessRequest;
use App\Models\DgtProcedure;
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
        return view('dgt_procedures.index');
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
    public function show(DgtProcedure $dgtProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DgtProcedure $dgtProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDgtProcessRequest $request, DgtProcedure $dgtProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DgtProcedure $dgtProcess)
    {
        //
    }
}
