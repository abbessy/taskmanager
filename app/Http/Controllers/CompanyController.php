<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
 /*   public function create()
    {
        $company = Company::latest()->first();

        return view('invite-client',['company' => $company]);
    } */
  
    public function store(Request $request)
    {
      
        Company::create($request->all());
       
        return redirect('clients/invite')->with('success','Company created successfully.');
    }
}
