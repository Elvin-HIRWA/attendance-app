<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function index()
    {
        return Employee::all();
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'identity_number' => 'required'
        ]);

        return Employee::Create($request->all());
    }


    public function show($id)
    {
        return Employee::find($id);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $employee = Employee::find($id);
        $employee->update($request->all());
        return $employee;
    }


    public function destroy($id)
    {

        return DB::delete("DELETE FROM Employee WHERE id=?", [$id]);
    }

    public function search($name)
    {
        return Employee::where('name', 'like', '%' . $name . '%')->get();
    }
}
