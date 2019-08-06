<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rod;
use App\RodBrand;
use App\Customer;

class RodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rodBrandRecords = RodBrand::where('active', 1)->get();
      $brands = $this->process_rod_brands($rodBrandRecords);

      $rodRecords = Rod::paginate(10);
      return view('rod.index')->with(['records' => $rodRecords, 'brands' => $brands]);
    }

    /**
    * Process rod brands to convert from object property to array property
    *
    * @return Array
    */
    private function process_rod_brands($brands){
      if(empty($brands))
        return [];

      $brand_array = [];

      foreach ($brands as $key => $brand) {
        $brand_array[$brand->id] = $brand->name;
      }

      return $brand_array;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $rodBrandRecords = RodBrand::where('active', 1)->get();
      return view('rod.create')->with('records', $rodBrandRecords);
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
        'ms_rod' => 'required',
        'total_amount' => 'required',
        'rate' => 'required',
        'price' => 'required',
        'customer_name' => 'required',
        'brand' => 'required'
      ]);

      $data['ms_rod'] = $request->get('ms_rod');
      $data['total_amount'] = $request->get('total_amount');
      $data['rate'] = $request->get('rate');
      $data['price'] = $request->get('price');
      $data['customer_name'] = $request->get('customer_name');
      $data['brand'] = $request->get('brand');
      $data['due_no'] = $request->get('due_no');

      $customer_payment_due = $this->check_customer_payment_type_due($data['total_amount'], $data['rate'], $data['price']);

      if($customer_payment_due){
        $due_money = $this->get_customer_due_amount($data['total_amount'], $data['rate'], $data['price']);

        $data['due_money'] = $due_money;
        $data['mobile'] = $request->get('mobile');
        $data['national_id'] = $request->get('national_id');
        $data['address'] = $request->get('address');
        $data['bank_name'] = $request->get('bank_name');
        $data['bank_account_no'] = $request->get('bank_account_no');
        $data['source'] = 'rod';

        // $validatedData = $request->validate([
        //     'mobile' => 'required',
        //     'address' => 'required'
        // ]);

        $customer_id = $this->save_customer($data);
      }

      $rod_record = [
        'ms_rod' => $data['ms_rod'],
        'total_amount' => $data['total_amount'],
        'rate' => $data['rate'],
        'price' => $data['price'],
        'customer_name' => $data['customer_name'],
        'brand' => $data['brand'],
        'due_no' => $data['due_no']
      ];

      if(isset($customer_id))
        $rod_record['customer_id'] = $customer_id;

      $rod = new Rod($rod_record);

      $rod->save();
      return redirect('/rod/create')->with('success', 'Record saved!');
    }

    /**
    * Get due money of a customer
    *
    * @return Integer
    */
    private function get_customer_due_amount($total_amount, $rate, $price){
      $total_amount = intval($total_amount);
      $rate = intval($rate);
      $price = intval($price);

      $total_price = $total_amount * $rate;

      $due_price = $total_price - $price;

      return $due_price;
    }

    /**
    * Save customer and get id
    *
    * @return Integer
    */
    private function save_customer($data){
      $customer = new Customer([
          'name' => $data['customer_name'],
          'mobile' => $data['mobile'],
          'national_id' => $data['national_id'],
          'address' => $data['address'],
          'bank_name' => $data['bank_name'],
          'bank_account_number' => $data['bank_account_no'],
          'due_money' => $data['due_money'],
          'source' => $data['source']
      ]);

      $customer->save();

      return $customer->id;
    }

    /**
    * Check whether customer payment is due
    *
    * @return Boolean
    */
    private function check_customer_payment_type_due($total_amount, $rate, $price){
      $total_amount = intval($total_amount);
      $rate = intval($rate);
      $price = intval($price);

      $total_price = $total_amount * $rate;

      if($price < $total_price)
        return true;
      else
        return false;
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
