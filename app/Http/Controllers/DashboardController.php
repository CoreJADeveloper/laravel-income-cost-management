<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cement;
use App\Rod;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $cementRecords = Cement::select('id', 'total_amount', 'rate',
                        'created_at', DB::raw('(total_amount * rate) as total'))
                        ->whereMonth('created_at', '=', Carbon::now()->month)
                        ->whereNull('due_no')->get();


      $cementRecords = $this->process_chart_information($cementRecords);

      $rodRecords = Rod::select('id', 'total_amount', 'rate',
                        'created_at', DB::raw('(total_amount * rate) as total'))
                        ->whereMonth('created_at', '=', Carbon::now()->month)
                        ->whereNull('due_no')->get();


      $rodRecords = $this->process_chart_information($rodRecords);

      return view('dashboard')->with(['cement_records' => $cementRecords, 'rod_records' => $rodRecords]);
    }

    private function process_chart_information($records){
      if (!empty($records)){
        foreach ($records as $key => $record) {
          $label = Carbon::parse($record['created_at'])->format('d M');
          if(isset($entityRecords) && array_key_exists($label, $entityRecords)){
            $previous_data = $entityRecords[$label];
            $entityRecords[$label] = $previous_data + $record['total'];
          } else {
            $entityRecords[$label] = $record['total'];
          }
        }

        $chart_records['labels'] = array_keys($entityRecords);
        $chart_records['data'] = array_values($entityRecords);

        return $chart_records;
      }

      return [];
    }
}
