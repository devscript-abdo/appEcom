<?php

namespace App\Http\Controllers;

use App\Models\Treasury;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TreasuryController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('theme_a.Treasury._livewire.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treasury  $treasury
     * @return Response
     */
    public function show(Treasury $treasury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treasury  $treasury
     * @return Response
     */
    public function edit(Treasury $treasury)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treasury  $treasury
     * @return Response
     */
    public function update(Request $request, Treasury $treasury)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treasury  $treasury
     * @return Response
     */
    public function destroy(Treasury $treasury)
    {
        //
    }
}
