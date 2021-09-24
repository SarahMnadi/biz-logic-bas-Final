<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        if (Gate::allows('isAdmin')) {
            // $organizations = Organization::orderBy('updated_at', 'asc')->take(5)->get();
            $organizations = Organization::all();
            return view('organization.manage')->with([
                'organizations' => $organizations
            ]);
        }
        if (Gate::allows('isOrganizationHead')) {
            $organizations = [];
            $organization = User::find($userId)->organization;
            array_push($organizations, $organization);
            return view('organization.manage')->with([
                'organizations' => $organizations
            ]);
        }

        // dd($organizations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'registrationNumber' => 'required',
            'registrationName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required | email',
            'address' => 'required',
        ]);

        //create new organization
        $organization = new Organization();
        $organization->organization_id = $request->input('registrationNumber');
        $organization->organization_name = $request->input('registrationName');
        $organization->organization_phone_number = $request->input('phoneNumber');
        $organization->organization_email = $request->input('email');
        $organization->organization_address = $request->input('address');
        if ($organization->save()) {
            return redirect()->route('manageOrganization', Auth::user()->user_id);
            // $newOrganization = Organization::find($organization->organization_id);
            // return response()->json([
            //     'success' => 'success', 'newOrganization' => $newOrganization
            // ]);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function showOne($organizationId)
    {
        $organization = Organization::find($organizationId);
        if (!$organization) {
            return response()->json([
                'error' => 'organization do not exist'
            ], 404);
        }
        $organization->branches;
        $organization->devices;
        return response()->json([
            'organization' => $organization
        ], 200);
    }

    public function showAll()
    {
        $organizations = Organization::all();
        foreach ($organizations as $organization) {
            $organization->devices;
            $organization->branches;
        }

        return view('organization.listallorganizations')->with([
            'organizations' => $organizations
        ]);
        // return response()->json([
        //     'organizations' => $organizations
        // ], 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organization::find($id);
        return view('organization.edit')->with([
            'organization' => $organization
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'registrationNumber' => 'required',
            'registrationName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required | email',
            'address' => 'required',
        ]);

        $organization = Organization::find($request->input('registrationNumber'));
        if (!$organization) {
            return response()->json([
                'error' => 'Organization not found'
            ], 404);
        }

        $organization->update([
            'organization_name' => $request->input('registrationName'),
            'organization_phone_number' => $request->input('phoneNumber'),
            'organization_email' => $request->input('email'),
            'organization_address' => $request->input('address'),
        ]);

        return redirect()->route('manageOrganization', Auth::user()->user_id);

        // return response()->json([
        //     'organization' => $organization
        // ], 206);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
    }
    public function showLatestTen()
    {
        $allOrganizations = Organization::orderBy('updated_at', 'desc')->take(10)->get();
        return response()->json([
            'organizations' => $allOrganizations
        ], 200);
    }

    public function returnName($organizationId)
    {
        $organization = Organization::find($organizationId);
        $name = $organization->organization_name;
        return response()->json([
            'organozationName' => $name

        ]);
    }
}
