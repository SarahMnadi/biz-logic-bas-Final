<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Staff;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class staffDetailsController extends Controller
{
    
    public function index()
    {
        return view('staffDetails');

    }

    public function staffDetails(Request $request)
    {
        $cc = Data::all();
        return datatables()->of($cc)
        ->addColumn('action', function ($row) {
                        $html = '<a href="#" class="btn btn-xs btn-secondary">View</a> ';
                        return $html;
                    })
        ->addColumn('hours', function ($row) {

            // $staff = DB::table('logs')
            // ->select(array('time_in', 'time_out'))
            // ->get(['$row-id'])->unique('$row_id');  
            // $timeIn = $staff[0]->time_in;
            // $timeOut =$staff[0]->time_out;
            // $startTime = Carbon::parse($timeIn); 
            // $endTime =  Carbon::parse($timeOut); 
            // $totalDuration = $endTime->diffForHumans($startTime); 

            //             // $html ='<a href="'. route("home") .'"></a>';
            //             return $totalDuration;
                    })
                    
       ->addColumn('days', function ($row) {
        $data = Log::select('date as date')
        ->groupBy('date')
        ->get();
        return count($data);
                    })

       ->addColumn('overtime', function ($row) {
                        $html = '2 hours';
                        return $html;
                    })
        ->addColumn('weekends', function ($row) {
                        $html = '1 weekend, saturday';
                        return $html;
                    })
        ->addColumn('holidays', function ($row) {
                        $html = 'No Holiday ';
                        return $html;
                    })
      ->rawColumns(['action', 'hours','days','overtime','weekends','holidays'])
       ->toJson();    
    }

}
