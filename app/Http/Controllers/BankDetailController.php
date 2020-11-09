<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\BankDetail;
use Illuminate\Http\Request;


class BankDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankDetails = BankDetail::where('user_id', Auth::user()->id)->get();
        
        return view('bankdetail', ['bankDetails' => $bankDetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankDetail $bankDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankDetail $bankDetail)
    {
        //
    }
}
