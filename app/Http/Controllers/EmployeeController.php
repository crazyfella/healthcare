<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\File;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
    
        return view('admin.employee.index')->with('employees',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
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
            'employeeid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'joindate' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        


        $data = $request->all();
        if(empty($data['photo'])){
            $data['photo'] = "user.jpg";
        }else{
            $data['photo'] = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/employee'), $data['photo']);
        }
        

        $data['joindate'] = Carbon::createFromFormat('d/m/Y', $request->joindate)->format('Y-m-d');
        $data['birthdate'] = Carbon::createFromFormat('d/m/Y', $request->joindate)->format('Y-m-d');
        Employee::create($data);
  

        return redirect()->route('employees.index')
                        ->with('success','Employee created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

        $request->validate([
            'employeeid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'joindate' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        if(empty($data['photo'])){
            $data['photo'] = "user.jpg";
        }else{
            File::delete(public_path(('/images/employee/').$employee->photo));
            $data['photo'] = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images/employee'), $data['photo']);
        }

        $data['joindate'] = Carbon::createFromFormat('d/m/Y', $request->joindate)->format('Y-m-d');
        $data['birthdate'] = Carbon::createFromFormat('d/m/Y', $request->joindate)->format('Y-m-d');

        $employee->update($data);
    
        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        File::delete(public_path(('/images/employee/').$employee->photo));
        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
        
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        return view('admin.employee.delete', compact('employee'));
    }
}
