<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rod;
use App\Cement;
use App\Customer;
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

    $result = DB::table('cements')
                ->join('customers', 'cements.customer_id', '=', 'customers.id')
                ->where('customers.name', $data['customer_name'])
                ->where('customers.mobile', $data['customer_mobile'])
                ->whereBetween('cements.created_at', [$date_from, $date_to])
                ->get();

    dd($result);

    $result = Cement::whereBetween('created_at', [$date_from, $date_to])->get()->toArray();

    // dd(DB::getQueryLog());

    dd($result);

    // $rodBrand = new RodBrand([
    //     'name' => $request->get('company_name'),
    //     'active' => $request->get('active')
    // ]);
    //
    // $rodBrand->save();
    // return redirect('/rod-brands')->with('success', 'Brand saved!');
  }
}
