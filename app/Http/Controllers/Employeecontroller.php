<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee;

class Employeecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::orderby('id','desc')->paginate(4);
        return view('index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email|email',
            'phone' => 'required|unique:employees,phone|numeric',
            'joining_date' => 'required',
            'salary' => 'required'
        ],[
            'phone' => 'phone number already exists',
            'email' => 'email is already exists'
        ]);

        $data= $request->except('_token');
        //mass assigment
        Employee::create($data);

    // this is one value insert in database  
    //   $employee= new Employee;
    //   $employee->name = $data ['name'];
    //   $employee->email = $data ['email'];
    //   $employee->joining_date = $data['joining_date'];
    //   $employee->salary = $data['salary'];
    //   $employee->phone = $data ['phone'];
    //   $employee->is_active = $data['is_active'];
    //   $employee->save();
    return redirect()
        ->route('employee.index')
        ->withMessage('Employee has been created succesfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // $employee =Employee::find($id);
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees,email,'.$employee->id.'|email',
            'phone' => 'required|unique:employees,phone,'.$employee->id.'|numeric',
            'joining_date' => 'required',
            'salary' => 'required'
        ],[
            'phone' => 'phone number already exists',
            'email' => 'email is already exists'
        ]);
        $data = $request->all();
        // $employee =Employee::find($id);
        $employee->update($data);
        return redirect()->route('employee.edit', $employee->id)
        ->withsucces('employee details updated succesfuly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')  
        ->withsucces('employee data deleted succesfuly');
    }
}
