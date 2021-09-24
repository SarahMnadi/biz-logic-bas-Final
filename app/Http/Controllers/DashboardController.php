<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Device;
use App\Models\Log;
use App\Models\Staff;
use App\Models\Organization;
use App\Models\Room;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
        public function getTime($userID)
        {
           
            return $data = Log::select('date as date')
       ->groupBy('date')
       ->get();
//        $array[] = ['date','total'];
//          foreach($data as $userID =>$value){
//          $array[++ $userID] = [$value->date, $value->total];
//    return $array;
       }
    //    $array[] = ['gender','total'];
    //    foreach($data as $key =>$value){
    //        $array[++ $key] = [$value->gender, $value->total];
    //    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy()
    { 
       
    //     $data = DB::table('staff')
    //     ->select(
    //      DB::raw('department as department'),
    //      DB::raw('count(*) as total'))
    //     ->groupBy('department')
    //     ->get();
    //   $array[] = ['department', 'total'];
    //   foreach($data as $key => $value)
    //   {
    //    $array[++$key] = [$value->department, $value->total];
    //    return($array);
    //   }
      $data = Staff::select('department', DB::raw('count(*) as total'))
      ->groupBy('department')
      ->get();
      $array[] = ['department','total'];
      foreach($data as $key =>$value){
          $array[++ $key] = [$value->department, $value->total];
      }
             return($array);

    //   return view('googleChart')->with([
    //     'gender'=> json_encode($array)

    // ]);
    //   return view('googleChart')->with('gender', json_encode($array));
     }
    
 
    public function index()
    {
        $staffs = Staff::all();
        $present_staffs = Log::where(['date' => date('Y-m-d')])->get('user_id')->unique('user_id'); 

         $data = Staff::select('gender', DB::raw('count(*) as total'))
       ->groupBy('gender')
       ->get();
       $array[] = ['gender','total'];
       foreach($data as $key =>$value){
           $array[++ $key] = [$value->gender, $value->total];
       }

       $data2 = Staff::select('department', DB::raw('count(*) as total'))
       ->groupBy('department')
       ->get();
       $array2[] = ['department','total'];
       foreach($data2 as $key =>$value){
           $array2[++ $key] = [$value->department, $value->total];
       }

       $present_not_staffs = count($staffs) - count($present_staffs);
      
    return view('dashboard')->with([
        'registered' => count($staffs),
        'staffs_present' => count($present_staffs),
        'staffs_not_present' => $present_not_staffs,
        'gender'=> json_encode($array),
        'department'=> json_encode($array2)


    ]);
   
    }
  
}
