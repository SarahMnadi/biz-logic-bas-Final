<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;




class checkController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Match_Print(Request $request)
    {
        $staffs = DB::table('staff')->get();

        return view('check', ['staff' => $staffs]);

      
   
   }
}

