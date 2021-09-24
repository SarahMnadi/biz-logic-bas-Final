<?php namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{

    public function index()
    {
        return view('customers');
    }

    public function data()
    {
        $customers = Customer::all();
        return datatables()->of($customers)->toJson();
    }
}