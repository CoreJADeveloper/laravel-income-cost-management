<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommonController extends Controller
{
    public function toggle_rod_brand(Request $request){
      $brand_id = $request->get('id');
      $active = $request->get('active');

      DB::table('rod_brands')
            ->where('id', $brand_id)
            ->update(['active' => $active]);
      return response()->json(['success'=> true]);
    }

    public function toggle_cement_brand(Request $request){
      $brand_id = $request->get('id');
      $active = $request->get('active');

      DB::table('cement_brands')
            ->where('id', $brand_id)
            ->update(['active' => $active]);
      return response()->json(['success'=> true]);
    }
}
