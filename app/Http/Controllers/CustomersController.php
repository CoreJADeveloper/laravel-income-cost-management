<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Cement;
use App\Rod;

class CustomersController extends Controller
{
    public function index(){
      $customerRecords = Customer::paginate(10);
      return view('customer.index')->with(['records' => $customerRecords]);
    }

    public function customer($id){
      if (Cement::where('customer_id', '=', $id)->exists()) {
        $product = Cement::where('customer_id', $id)->first();
      } else if (Rod::where('customer_id', '=', $id)->exists()) {
        $product = Rod::where('customer_id', $id)->first();
      }

      $customerRecord = Customer::where('id', $id)->first();
      return view('customer.single')->with(['record' => $customerRecord, 'product' => $product]);
    }
}
