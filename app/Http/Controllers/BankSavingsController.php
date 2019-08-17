<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankSaving;

class BankSavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bankSavings = BankSaving::paginate(10);
      return view('bank-saving.index')->with('records', $bankSavings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank-saving.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'bank_account_number' => 'required',
          'amount' => 'required'
      ]);

      $bankSaving = new BankSaving([
          'bank_account_number' => $request->get('bank_account_number'),
          'amount' => $request->get('amount'),
          'comment' => $request->get('comment')
      ]);

      $bankSaving->save();
      return redirect('/bank-savings')->with('success', 'Money saved to bank account!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
