<?php


namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceController extends Controller
{
     
    public function index()
    {
        return view('staffDetails');

    }

    public function staffDetails(Request $request)
    {
        $staff = DB::table('logs')
        ->select(array('time_in', 'time_out'))
        ->get(['user_id'])->unique('user_id');  
        $timeIn = $staff[0]->time_in;
        $timeOut =$staff[0]->time_out;
        $startTime = Carbon::parse($timeIn); 
        $endTime =  Carbon::parse($timeOut); 
        $totalDuration = $endTime->diffForHumans($startTime); 

        $cc = Attendance::all();
        return datatables()->of($cc)
        ->addColumn('action', function ($row) {
                        $html = '<a href="#" class="btn btn-xs btn-secondary">View</a> ';
                        return $html;
                    })
    //     ->addColumn('hours', function ($row) {
    //                     $html ='<a href="'. route("home") .'"></a>';
    //                     return $html;
    //                 })
    //    ->addColumn('days', function ($row) {
    //                     $html = '5 days';
    //                     return $html;
    //                 })
    //    ->addColumn('overtime', function ($row) {
    //                     $html = '2 hours';
    //                     return $html;
    //                 })
    //     ->addColumn('weekends', function ($row) {
    //                     $html = '1 weekend, saturday';
    //                     return $html;
    //                 })
    //     ->addColumn('holidays', function ($row) {
    //                     $html = 'No Holiday ';
    //                     return $html;
    //                 })
    //   ->rawColumns(['action', 'hours','days','overtime','weekends','holidays'])
       ->toJson();    
    }

}
