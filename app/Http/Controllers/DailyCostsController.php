<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyCost;

class DailyCostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dailyCosts = DailyCost::orderBy('created_at','desc')->paginate(10);
      return view('daily-cost.index')->with(['records' => $dailyCosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('daily-cost.create');
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
          'cost_type' => 'required',
          'amount' => 'required'
      ]);

      $dailyCost = new DailyCost([
          'cost_type' => $request->get('cost_type'),
          'amount' => $request->get('amount'),
          'comment' => $request->get('comment')
      ]);

      $dailyCost->save();
      return redirect('/daily-costs')->with('success', 'Daily Cost saved!');
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
