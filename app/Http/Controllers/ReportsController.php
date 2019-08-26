<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Rod;
use App\RodBrand;
use App\Cement;
use App\CementBrand;
use App\Customer;
use App\BankSaving;
use DB;

class ReportsController extends Controller
{
  /**
   * Show report options
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('report.index');
  }

  /**
   * Generate report for selected options
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function view(Request $request)
  {
    $validatedData = $request->validate([
        'report_start_date' => 'required',
        'report_end_date' => 'required'
    ]);

    DB::enableQueryLog();

    $data['report'] = $request->get('report');
    $data['customer_name'] = $request->get('customer_name');
    $data['customer_mobile'] = $request->get('customer_mobile');
    $data['customer_name'] = $request->get('customer_name');
    $data['start_date'] = $request->get('report_start_date');
    $data['end_date'] = $request->get('report_end_date');
    $data['report_type'] = $request->get('report_type');

    // $date_from = \DateTime::createFromFormat("Y-m-d H:i:s", $data['start_date']);
    // $date_to = \DateTime::createFromFormat("Y-m-d H:i:s", $data['end_date']);

    // $date_from = strtotime($data['start_date']);
    // $date_to = strtotime($data['end_date']);

    // echo $from;
    // echo $to;
    //
    // $records = Cement::whereBetween('created_at', [$from, $to])->get();

    $date_from = Carbon::parse($data['start_date'])->startOfDay();
    $date_to = Carbon::parse($data['end_date'])->endOfDay();

    // echo Carbon::createFromFormat('Y-m-d H:i:s', $data['start_date'] .' 00:00:00')->toDateTimeString(); // 1975-05-21 22:00:00

    // $result = Cement::whereDate('created_at', '>=', $date_from)
    // ->whereDate('created_at', '<=', $date_to)
    // ->get()
    // ->toArray();

    // $result = Cement::whereBetween('created_at', [$data['start_date'].' 00:00:00', $data['end_date'].' 23:59:59'])->get();
    // $user = Customer::where('name', '=', $data['customer_name'])
    //                   ->where('mobile', '=', $data['customer_mobile'])
    //                   ->first();

    // if($data['report'] == 'cement'){
    //   $query = DB::table('cements');
    // } else if($data['report'] == 'rod'){
    //   $query = DB::table('rods');
    // } else if($data['report'] == 'both'){
    //   $query = DB::table('cements')
    //            ->with('rods')
    // }
    //
    // if($data['customer_name'] != ''){
    //
    // }
    //
    // $query->whereBetween('cements.created_at', [$date_from, $date_to]);

    if($data['report'] == 'cement'){
      $result = DB::table('cements');

      if($data['customer_name'] != '' || $data['customer_mobile'] != ''){
        $result->join('customers', 'cements.customer_id', '=', 'customers.id');
      }

      if($data['customer_name'] != '' && $data['customer_mobile'] != ''){
        $result->where('customers.name', $data['customer_name'])
               ->where('customers.mobile', $data['customer_mobile']);
      } else if($data['customer_name'] != ''){
        $result->where('customers.name', $data['customer_name']);
      } else if($data['customer_mobile'] != ''){
        $result->where('customers.mobile', $data['customer_mobile']);
      }

      if($data['report_type'] == 'sell'){
        $result->whereNull('cements.due_no');
      } else if($data['report_type'] == 'buy'){
        $result->whereNotNull('cements.due_no');
      } else if($data['report_type'] == 'due_money'){
        $result->where('cements.customer_id', '!=', 0);
        $result->whereNull('cements.due_no');
      }

      $result->whereBetween('cements.created_at', [$date_from, $date_to]);

      $cementBrandRecords = CementBrand::where('active', 1)->get();
      $brands = $this->process_cement_brands($cementBrandRecords);

      $cementRecords = $result->paginate(10);
      return view('report.cement')->with(['records' => $cementRecords->appends(Input::except('page')), 'brands' => $brands]);
    } else if($data['report'] == 'rod'){
      $result = DB::table('rods');

      if($data['customer_name'] != '' || $data['customer_mobile'] != ''){
        $result->join('customers', 'rods.customer_id', '=', 'customers.id');
      }

      if($data['customer_name'] != '' && $data['customer_mobile'] != ''){
        $result->where('customers.name', $data['customer_name'])
               ->where('customers.mobile', $data['customer_mobile']);
      } else if($data['customer_name'] != ''){
        $result->where('customers.name', $data['customer_name']);
      } else if($data['customer_mobile'] != ''){
        $result->where('customers.mobile', $data['customer_mobile']);
      }

      if($data['report_type'] == 'sell'){
        $result->whereNull('rods.due_no');
      } else if($data['report_type'] == 'buy'){
        $result->whereNotNull('rods.due_no');
      } else if($data['report_type'] == 'due_money'){
        $result->where('rods.customer_id', '!=', 0);
        $result->whereNull('rods.due_no');
      }

      $result->whereBetween('rods.created_at', [$date_from, $date_to]);

      $rodBrandRecords = RodBrand::where('active', 1)->get();
      $brands = $this->process_rod_brands($rodBrandRecords);

      $rodRecords = $result->paginate(10);
      return view('report.rod')->with(['records' => $rodRecords->appends(Input::except('page')), 'brands' => $brands]);
    } else if($data['report'] == 'bank_saving'){
      $result = DB::table('bank_savings');

      $result->whereBetween('bank_savings.created_at', [$date_from, $date_to]);

      $bankSavings = $result->paginate(10);
      return view('report.bank_saving')->with('records', $bankSavings->appends(Input::except('page')));
    } else if($data['report'] == 'due_collection'){
      $result = DB::table('due_collections');

      if($data['customer_name'] != '' && $data['customer_mobile'] != ''){
        $result->where('due_collections.customer_name', $data['customer_name'])
               ->where('due_collections.customer_mobile', $data['customer_mobile']);
      } else if($data['customer_name'] != ''){
        $result->where('due_collections.customer_name', $data['customer_name']);
      } else if($data['customer_mobile'] != ''){
        $result->where('due_collections.customer_mobile', $data['customer_mobile']);
      }

      $result->whereBetween('due_collections.created_at', [$date_from, $date_to]);

      $dueCollection = $result->paginate(10);
      return view('report.due_collection')->with('records', $dueCollection->appends(Input::except('page')));
    }

    // dd(DB::getQueryLog());

    // $rodBrand = new RodBrand([
    //     'name' => $request->get('company_name'),
    //     'active' => $request->get('active')
    // ]);
    //
    // $rodBrand->save();
    // return redirect('/rod-brands')->with('success', 'Brand saved!');
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
  * Process cement brands to convert from object property to array property
  *
  * @return Array
  */
  private function process_cement_brands($brands){
    if(empty($brands))
      return [];

    $brand_array = [];

    foreach ($brands as $key => $brand) {
      $brand_array[$brand->id] = $brand->name;
    }

    return $brand_array;
  }
}
