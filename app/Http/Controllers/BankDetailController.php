<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\BankDetail;
use Illuminate\Http\Request;


class BankDetailController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'user', 'verified']);
    // }
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
        return view('bankdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validateBankDetails($request);

        $bankDetail = new BankDetail($this->validateBankDetails($request));
        $bankDetail->user_id = Auth::user()->id;
        $bankDetail->save();

        return redirect()->route('bankdetail.index')->with('status','Bank details added successfully');
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
    public function edit(BankDetail $bankDetail, $id)
    {
        return view('bankdetails.edit', ['bankDetail' => $bankDetail->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankDetail $bankDetail, $id)
    {
        
        $bankDetail->find($id)->update($this->validateBankDetails($request));
        return redirect()->route('bankdetail.index')->with('status','Bank detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankDetail $bankDetail, $id)
    {
        $bankDetail->find($id)->delete();
        return redirect()->route('bankdetail.index')->with('status','Bank detail deleted successfully');
    }

    // Validation Method to validate input data from forms
    public function validateBankDetails($request)
    {
        $validatedData = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'account_name' => ['required', 'string', 'max:255'],
            'account_no'   => 'required |max:10',
        ]);

        return $validatedData;
    }
}
