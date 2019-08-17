<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DueCollection;

class DueCollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dueCollection = DueCollection::paginate(10);
      return view('due-collection.index')->with('records', $dueCollection);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('due-collection.create');
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
          'customer_name' => 'required',
          'amount' => 'required'
      ]);

      $dueCollection = new DueCollection([
          'customer_name' => $request->get('customer_name'),
          'customer_mobile' => $request->get('customer_mobile'),
          'amount' => $request->get('amount'),
          'comment' => $request->get('comment')
      ]);

      $dueCollection->save();
      return redirect('/due-collections')->with('success', 'Saved!');
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
