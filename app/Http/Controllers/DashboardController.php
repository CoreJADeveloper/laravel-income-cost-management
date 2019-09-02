<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cement;
use App\CementBrand;
use App\Rod;
use App\RodBrand;
use App\BankSaving;
use App\DueCollection;
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
      $cementRecords = Cement::select('id', 'total_amount', 'brand', 'rate',
                        'created_at', DB::raw('(total_amount * rate) as total'))
                        ->whereMonth('created_at', '=', Carbon::now()->month)
                        ->whereNull('due_no')->get();


      $cementRecords = $this->process_chart_information($cementRecords);

      $rodRecords = Rod::select('id', 'total_amount', 'brand', 'rate',
                        'created_at', DB::raw('(total_amount * rate) as total'))
                        ->whereMonth('created_at', '=', Carbon::now()->month)
                        ->whereNull('due_no')->get();

      $rodRecords = $this->process_chart_information($rodRecords);

      $bankSavingsRecords = BankSaving::select('id', 'bank_account_number',
                        'amount', 'created_at')
                        ->whereMonth('created_at', '=', Carbon::now()->month)
                        ->get();


      $bankSavingsRecords =
      $this->process_bank_saving_chart_information($bankSavingsRecords);

      $dueCollectionsSavingsRecords =
      DueCollection::select('id',
                        'amount', 'created_at')
                        ->whereMonth('created_at', '=', Carbon::now()->month)
                        ->get();


      $dueCollectionsSavingsRecords =
      $this->process_due_collection_chart_information($dueCollectionsSavingsRecords);

      $cementBrandRecords = CementBrand::get();
      $cement_brands = $this->process_cement_brands($cementBrandRecords);

      $rodBrandRecords = RodBrand::get();
      $rod_brands = $this->process_rod_brands($rodBrandRecords);

      return view('dashboard')->with(['cement_records' => $cementRecords,
      'cement_brands' => $cement_brands,
      'bank_saving_records' => $bankSavingsRecords,
      'due_collection_records' => $dueCollectionsSavingsRecords,
      'rod_records' => $rodRecords,
      'rod_brands' => $rod_brands]);
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

    private function process_due_collection_chart_information($records){
      if (!empty($records)){
        foreach ($records as $key => $record) {
          $label = Carbon::parse($record['created_at'])->format('d M');
          if(isset($dueCollectionRecords) && array_key_exists($label, $dueCollectionRecords)){
            $previous_data = $dueCollectionRecords[$label];
            $dueCollectionRecords[$label] = $previous_data + $record['amount'];
          } else {
            $dueCollectionRecords[$label] = $record['amount'];
          }
        }

        $chart_records['labels'] = isset($dueCollectionRecords) ? array_keys($dueCollectionRecords) : [];
        $chart_records['data'] = isset($dueCollectionRecords) ? array_values($dueCollectionRecords) : [];
        $chart_records['total_due_collections'] = isset($dueCollectionRecords) ?  array_sum($dueCollectionRecords) : 0;

        return $chart_records;
      }

      return [];
    }

    private function process_bank_saving_chart_information($records){
      if (!empty($records)){
        foreach ($records as $key => $record) {
          $label = Carbon::parse($record['created_at'])->format('d M');
          if(isset($bankSavingRecords) && array_key_exists($label, $bankSavingRecords)){
            $previous_data = $bankSavingRecords[$label];
            $bankSavingRecords[$label] = $previous_data + $record['amount'];
          } else {
            $bankSavingRecords[$label] = $record['amount'];
          }
        }

        $chart_records['labels'] = isset($bankSavingRecords) ? array_keys($bankSavingRecords) : [];
        $chart_records['data'] = isset($bankSavingRecords) ? array_values($bankSavingRecords) : [];
        $chart_records['total_savings'] = isset($bankSavingRecords) ? array_sum($bankSavingRecords) : 0;

        return $chart_records;
      }

      return [];
    }

    private function process_chart_information($records){
      if (!empty($records)){
        foreach ($records as $key => $record) {
          $label = Carbon::parse($record['created_at'])->format('d M');
          if(isset($sellRecords) && array_key_exists($label, $sellRecords)){
            $previous_data = $sellRecords[$label];
            $sellRecords[$label] = $previous_data + $record['total'];
          } else {
            $sellRecords[$label] = $record['total'];
          }

          $brand = $record['brand'];
          if(isset($totalAmountRecords) && array_key_exists($brand, $totalAmountRecords)){
            $previous_data = $totalAmountRecords[$brand];
            $totalAmountRecords[$brand] = $previous_data + $record['total_amount'];
          } else {
            $totalAmountRecords[$brand] = $record['total_amount'];
          }
        }

        $chart_records['labels'] = isset($sellRecords) ? array_keys($sellRecords) : [];
        $chart_records['data'] = isset($sellRecords) ? array_values($sellRecords) : [];
        $chart_records['total_sell'] = isset($sellRecords) ? array_sum($sellRecords) : 0;

        $chart_records['brands'] = isset($totalAmountRecords) ? array_keys($totalAmountRecords) : [];
        $chart_records['brands_data'] = isset($totalAmountRecords) ? array_values($totalAmountRecords) : [];

        return $chart_records;
      }

      return [];
    }
}
