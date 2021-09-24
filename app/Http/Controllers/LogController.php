<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use App\Models\Data;
use App\Models\Userstatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


class LogController extends Controller
{
    public function index()
    {
        $logs = Log::all();
        // $todayLogs = Log::where('date', date('Y-m-d'))->get();
        return view('log.overall')->with([
            'logs' => $logs,
            'type' => 1
        ]);
    }

    public function fingerprintOverallLogs()
    {
            $logs = Log::all();
            foreach($logs as $log){
                $log->user;
            }

            // return response()->json(['logs' => $logs]);
            // $todayLogs = Log::where('date', date('Y-m-d'))->get();
            return view('log.fingerprintoveralllogs')->with([
                'logs' => $logs,
                'arrive_time' => '08:00'

            ]);
         
    }
    
    public function fingerprintCheckInOrOut($userID)
    {  
            $staff = Log::select('user_id', 'time_out','time_in')
            ->get();
        
        $currentTime = Carbon::now()->timezone('Africa/Dar_es_Salaam')->format('Y-m-d H:i:s'); //get current time
        $currentDate = date('Y-m-d'); //get current date
      
                          // get user name
                          $todayLogs = Log::where('user_id', $userID)->where('date', $currentDate)->get(); //get all logs of that user on a particular day
   
                            $x = User::find($userID);   
                            $name = $x->first_name . " " . $x->last_name;
                            
                          //if no log found create new
                            if (count($todayLogs) == 0) {
                                Log::create([
                                    'user_id' => $userID,
                                    'time_in' => $currentTime,
                                    'date' => $currentDate,
                                ]);
                                return "  "  .$name. " You are login Successfully";
                            } else {
                                //if logs found loop through and update the time out field
                                foreach ($todayLogs as $log) {
                                    if ($log->time_out == null) {
                                        $log->update([
                                            'time_out' => $currentTime
                                        ]);
                                        //To insert working hours per day
                                            $timeIn = $log->time_in;
                                            $timeOut =$log->time_out;
                                            $startTime = Carbon::parse($timeIn); 
                                            $endTime =  Carbon::parse($timeOut); 
                                            $totalDuration = $endTime->diffForHumans($startTime);

                                            // //To insert working days per day
                                        //     $u = Log::find($userID); 
                                        //    $date= Log::find($userID, ['date as date']);
                                        //    return $date;
                                           
                                                   //     $u = Log::find($userID); 

                                            // $data = Log::select('date as date')
                                            // ->groupBy('date')
                                            // ->get();
                                            // return $data;
                                            
                                        //     $data = Log::select('time_in as date')
                                        //     ->groupBy('time_in')
                                        //   ->where('time_in', '>', Carbon::now())->count();
                                        //     // ->get();
                                        //     return $data;

                                         
                                            // $tt = Log::select('time_in');
                                            // // ->whereDate('time_in', '>', Carbon::now())->count();
                                            // return $tt;

                                            // $this->data['Tasks'] = \DB::table('tb_tasks')
                                            // ->where('Status', 'like', 'Open%')
                                            // ->whereDate('DeadLine', '>', Carbon::now())->count();


                                        //    $date= Log::find($userID)
                                        //    ->pluck('date', 'user_id')
                                        //    ->all();
                                        //    return $date;
                                        //    $date= Log::find($userID,
                                        //    ['date'])->toArray()['date'];
                                        //    return $date;
                                            // $u= Log::select('date as date')  
                                        //    $u= Log::select('date','user_id')
                                        //    ->where('id', 14)
                                        //    ->get();
                                        //    return $u;

                                        //   $d= Log::all('date', 'user_id');
                                        //   foreach ($d as $u) {
                                        //   return $log;
                                        //   }


                                  //    ->groupBy('date');

                                            // echo $u;
                                            // $x= Log::select('date as date')
                                            // // ->groupBy('date')
                                            // ->get();
                                            // echo $x;

                                            // $data = Log::select('date', DB::raw('count(*) as total'))
                                            // ->groupBy('date')
                                            // ->get();
                                            // $array[] = ['date','total'];
                                            // foreach($data as $u =>$value){
                                            //     $array[++ $u] = [$value->date, $value->total];
                                            // }
                                            // //        return($array);
                                            // $dd=Log::select('date', DB::raw("count(*) as total"),$userID) 
                                            // ->groupBy(DB::raw($userID))
                                            //  ->get();
                                            //  return $dd;




                                            Data::insert([
                                                'first_name' =>$x->first_name,
                                                'last_name' =>$x->last_name, 
                                                'hours' => $totalDuration,
                                                // 'date' =>$currentDate
                                            ]);
                                            // echo $userInfo->first_name.' '.$totalDuration.'\n';     
                                        return "  "  .$name. " You are logout Successfully";
                                    } else {
                                        continue;
                                    }
                                }
                                //if for the found log all check out time is note null create new log
                                Log::create([
                                    'user_id' => $userID,
                                    'time_in' => $currentTime,
                                    'date' => $currentDate,
                                ]);
                                // Data::insert([
                                //     'first_name' =>$x->first_name,
                                //     'last_name' =>$x->last_name,  
                                // ]);
                                return "  "  .$name. " You are login Successfully";
                            }
                        
                      
                   
    }
    
    // public function fingerprintCheckInOrOut($userID)
    // {
    //     $currentTime = Carbon::now()->timezone('Africa/Dar_es_Salaam')->format('Y-m-d H:i:s'); //get current time
    //     $currentDate = date('Y-m-d'); //get current date
    //     $users = DB::table('users');
    //     $users = (object)$users->get();
       
        
    //     if (count($users) == 0) {
    //         return "No user has been registered in this device";
    //     } else {
    //         foreach ($users as $user) {
    //                     //   $userName = $user['first_name'];
    //                       $userName= $user->first_name;

    //                       // get user name
    //                       $todayLogs = Log::where('user_id', $userID)->where('date', $currentDate)->get(); //get all logs of that user on a particular day
   
    //                         $x = User::find($userID);
    //                         $name = $x->first_name + $x->last_name;
    //                       //if no log found create new
    //                         if (count($todayLogs) == 0) {
    //                             Log::create([
    //                                 'user_id' => $userID,
    //                                 'time_in' => $currentTime,
    //                                 'date' => $currentDate,
    //                             ]);
    //                             return "login Successfully" .$name;
    //                         } else {
    //                             //if logs found loop through and update the time out field
    //                             foreach ($todayLogs as $log) {
    //                                 if ($log->time_out == null) {
    //                                     $log->update([
    //                                         'time_out' => $currentTime
    //                                     ]);
    //                                     return "logout Successfully"  .$name;
    //                                 } else {
    //                                     continue;
    //                                 }
    //                             }
    //                             //if for the found log all check out time is note null create new log
    //                             Log::create([
    //                                 'user_id' => $userID,
    //                                 'time_in' => $currentTime,
    //                                 'date' => $currentDate,
    //                             ]);
    //                             return "login Successfully" .$name  ;
    //                         }
    //                     }
    //                 }
                      
                   
    // }

    public function allLogs()
    {

        $logs = Log::orderBy('id', 'desc')->get();
        foreach ($logs as $log) {
            $log->device->room;
        }

        return response()->json([
            'logs' => $logs
        ]);
    }

    public function sensitiveLogs($userId)
    {
        if (Gate::allows('isAdmin')) {
            $today_logs = Log::where(['date' => date('Y-m-d'), 'log_type' => 'rfid'])->get();
            $sensitiveLogs = [];
            foreach ($today_logs as $log) {
                if ($log->device->room->room_security_level == 'SENSITIVE') {
                    array_push($sensitiveLogs, $log);
                };
            }

            return view('log.sensitivelogs')->with([
                'logs' => $sensitiveLogs
            ]);
            // return response()->json([
            //     'logs' => $sensitiveLogs,
            // ]);
        } elseif (Gate::allows('isOrganizationHead')) {
            $organizationId = User::find($userId)->organization_id; //Get department id of logged in user
            $users = User::where('organization_id', $organizationId)->get('user_id'); //get all users of the particular department
            $today_logs = Log::where(['date' => date('Y-m-d'), 'log_type' => 'rfid'])->whereIn('user_id', $users)->get();
            $sensitiveLogs = [];
            foreach ($today_logs as $log) {
                if ($log->device->room->room_security_level == 'SENSITIVE') {
                    array_push($sensitiveLogs, $log);
                };
            }

            return view('log.sensitivelogs')->with([
                'logs' => $sensitiveLogs
            ]);
            // return response()->json([
            //     'logs' => $sensitiveLogs,
            // ]);
        } elseif (Gate::allows('isBranchHead')) {
            $branchId = User::find($userId)->branch_id; //Get branch id of logged in user
            $users = User::where('branch_id', $branchId)->get('user_id'); //get all users of the particular branch
            $today_logs = Log::where(['date' => date('Y-m-d'), 'log_type' => 'rfid'])->whereIn('user_id', $users)->get();
            $sensitiveLogs = [];
            foreach ($today_logs as $log) {
                if ($log->device->room->room_security_level == 'SENSITIVE') {
                    array_push($sensitiveLogs, $log);
                };
            }

            return view('log.sensitivelogs')->with([
                'logs' => $sensitiveLogs
            ]);
            // return response()->json([
            //     'logs' => $sensitiveLogs,
            // ]);
        } elseif (Gate::allows('isDepartmentHead')) {
            $departmentId = User::find($userId)->department_id; //Get department id of logged in user
            $users = User::where('department_id', $departmentId)->get('user_id'); //get all users of the particular department
            $today_logs = Log::where(['date' => date('Y-m-d'), 'log_type' => 'rfid'])->whereIn('user_id', $users)->get();
            $sensitiveLogs = [];
            foreach ($today_logs as $log) {
                if ($log->device->room->room_security_level == 'SENSITIVE') {
                    array_push($sensitiveLogs, $log);
                };
            }

            return view('log.sensitivelogs')->with([
                'logs' => $sensitiveLogs
            ]);
            // return response()->json([
            //     'logs' => $sensitiveLogs,
            // ]);
        }
    }

    public function nonSensitiveLogs($userId)
    {
        if (Gate::allows('isAdmin')) {
            $logs = Log::all();
            $nonSensitiveLogs = [];
            foreach ($logs as $log) {
                if ($log->device->room->room_security_level == 'NORMAL') {
                    array_push($nonSensitiveLogs, $log);
                };
            }

            return response()->json([
                'logs' => $nonSensitiveLogs,
            ]);
        } elseif (Gate::allows('isOrganizationHead')) {
            $organizationId = User::find($userId)->organization_id; //Get department id of logged in user
            $users = User::where('organization_id', $organizationId)->get('user_id'); //get all users of the particular department
            $logs = Log::whereIn('user_id', $users)->get();;
            $nonSensitiveLogs = [];
            foreach ($logs as $log) {
                if ($log->device->room->room_security_level == 'NORMAL') {
                    array_push($nonSensitiveLogs, $log);
                };
            }

            return response()->json([
                'logs' => $nonSensitiveLogs,
            ]);
        } elseif (Gate::allows('isBranchHead')) {
            $branchId = User::find($userId)->branch_id; //Get branch id of logged in user
            $users = User::where('branch_id', $branchId)->get('user_id'); //get all users of the particular branch
            $logs = Log::whereIn('user_id', $users)->get();;
            $nonSensitiveLogs = [];
            foreach ($logs as $log) {
                if ($log->device->room->room_security_level == 'NORMAL') {
                    array_push($nonSensitiveLogs, $log);
                };
            }

            return response()->json([
                'logs' => $nonSensitiveLogs,
            ]);
        } elseif (Gate::allows('isDepartmentHead')) {
            $departmentId = User::find($userId)->department_id; //Get department id of logged in user
            $users = User::where('department_id', $departmentId)->get('user_id'); //get all users of the particular department
            $logs = Log::whereIn('user_id', $users)->get();;
            $nonSensitiveLogs = [];
            foreach ($logs as $log) {
                if ($log->device->room->room_security_level == 'NORMAL') {
                    array_push($nonSensitiveLogs, $log);
                };
            }

            return response()->json([
                'logs' => $nonSensitiveLogs,
            ]);
        }
    }
}
