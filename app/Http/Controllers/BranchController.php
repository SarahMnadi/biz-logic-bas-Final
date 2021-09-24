<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        if (Gate::allows('isAdmin')) {
            $organizations = Organization::all();
            $branches = Branch::all();
            // $branches = Branch::orderBy('created_at', 'desc')->take(5)->get();
            return view('branch.manage')->with([
                'branches' => $branches,
                'organizations' => $organizations
            ]);
        }
        if(Gate::allows('isOrganizationHead')){
            $branches = User::find($userId)->organization->branches;
            return view('branch.manage')->with([
                'branches' => $branches,   
            ]);
        }

        if(Gate::allows('isBranchHead')){
            $branches = [];
            $branch = User::find($userId)->branch;
            array_push($branches, $branch);
            return view('branch.manage')->with([
                'branches' => $branches,  
            ]);
        }
  
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'organizationId' => 'required',
            'registrationNumber' => 'required',
            'registrationName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        //fetch parent
        $organization = Organization::find($request->input('organizationId'));
        if (!$organization) {
            return response()->json([
                'error' => 'Organization Not Exist,make sure you register organization'
            ]);
        }

        //create new branch
        $branch = new Branch();
        $branch->branch_id = $request->input('registrationNumber');
        $branch->branch_name = $request->input('registrationName');
        $branch->branch_phone_number = $request->input('phoneNumber');
        $branch->branch_email = $request->input('email');
        $branch->branch_address = $request->input('address');
        if ($organization->branches()->save($branch)) {
            return redirect()->route('manageBranch', Auth::user()->user_id);
            // $newBranch = Branch::find($branch->branch_id);
            // return response()->json([
            //     'success' => 'success',
            //     'branch' => $newBranch
            // ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('branch.edit')->with([
            'branch' => $branch
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'registrationNumber' => 'required',
            'registrationName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);


        $branch = Branch::find($request->input('registrationNumber'));
        if (!$branch) {
            return response()->json([
                'error' => 'branch not found'
            ], 404);
        }

        $branch->update([
            'branch_name' => $request->input('registrationName'),
            'branch_phone_number' => $request->input('phoneNumber'),
            'branch_email' => $request->input('email'),
            'branch_address' => $request->input('address'),
        ]);

        return redirect()->route('manageBranch', Auth::user()->user_id);
        // return response()->json([
        //     'branch' => $branch
        // ], 206);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
    public function showOne($branchId)
    {
        $branch = Branch::find($branchId);
        if (!$branch) {
            return response()->json([
                'error' => 'branch do not exist'
            ], 404);
        }

        $branch->departments;
        return response()->json([
            'branch' => $branch
        ], 200);
    }


    public function showAll()
    {
        $branches = Branch::all();
        foreach ($branches as $branch) {
            $branch->departments;
        }

        return view('branch.listallbranches')->with([
            'branches' => $branches
        ]);
        // return response()->json([
        //     'branches' => $branches
        // ], 200);
    }
}
