<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\DB;


// use DataTables;
use Yajra\DataTables\Services\DataTable;


class StaffController extends Controller
{
    public function index()
    {
        return view('staff.allStaffs');
        return view('staffDetails');

    }
    public function staffInfo($id)
    {
         $staff = Staff::find($id);
         return view('staff.staffInformations')->with([
             'staff' => $staff,
        ]);
        // $staff = DB::table('staff')->get();
        // return view('user.details', ['staff' => $staff]);
    }
    
public function delete($id) 
{
   DB::delete('DELETE FROM staff WHERE id = ?', [$id]  );
   
   echo ("User Record deleted successfully.");
   return redirect()->route('staffs');
}

// public function edit(Staff $staff)
// {
//     return view('editStaff',compact('Staff'));
// }

public function edit($id)
{
     $staff = Staff::find($id);
    return view('staff.editStaff')->with([
        'staff' => $staff
    ]);
}
public function update(Request $req)
{
    $staff=Staff:: find($req->id);
    $staff->first_name = $req->get('firstName');
    $staff->last_name = $req->get('lastName');
    $staff->user_id = $req->get('userID');
    $staff->email = $req->get('email');
    $staff->department = $req->get('department');
    $staff->phone_number = $req->get('phoneNumber');
    $staff->save();
    return redirect()->route('staffs')
    ->with('success','Product updated successfully');
}


    public function getStaff($staff_id){
        $staff = Staff::find($staff_id);
        return response()->json([
            'staff' => $staff
        ]);
        // return view('user.details')->with(['staff'=>$staff]);
        //sorry staff id ni ile id au user_id?
    }
    
    public function getStaff2(){
        $staff = Staff::all();
        return response()->json([
            'staff' => $staff
        ]);
        // return view('user.details')->with(['staff'=>$staff]);
    }
    public function getStaffs(Request $req)
    {
        $cc = Staff::all(); 
        return datatables()->of($cc)
        ->addColumn('status', function ($row) {
            $html = 'active';
            return $html;
        })
        ->addColumn('action', function ($cc) {
                        $html = '<a href="'. route("getAll", $cc->id) .'"><i class="fa fa-eye"></i></a>';
                        return $html;
                    })
      ->rawColumns(['status', 'action'])
        ->toJson();    
    }

   
public function staffDetails(Request $req)
{
    $cc = Staff::all();
    return datatables()->of($cc)
    ->addColumn('status', function ($row) {
        $html = 'active<br>Inactive';
        return $html;
    })
    ->addColumn('action', function ($row) {
                    $html = '<a href="{{ route ("showUserDetails", [$user->user_id]) }}" class="btn btn-xs btn-secondary">Edit</a> ';
                    $html = ' <a href="#"><i class="fas fa-cogs"></i></a> ';
                    return $html;
                })
  ->rawColumns(['status', 'action'])
           
   
    ->toJson();
    return view('staff');

    
}
public function getDepartment(Request $req)
{
    $users = DB::table('staff')->get();

    foreach ($users as $user) {
        echo $user->department;
    };
    // return response()->json([
    //        'staff' => $staff
    //      ]);

    //okay omba sim mu yA]
    //simu yake haina chag imezima,piga tu kwa ya kwangu,huwa haisumbui kama net iko poa
}
public function getGender(Request $req)
{
    $users = DB::table('staff')->get();

    foreach ($users as $user) {
        echo $user->gender;
    };  
    
}


}

