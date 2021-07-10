<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Profile;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('admin.employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
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
            "name" => "required|min:3|max:100",
            "job_title" => "required|min:3|max:100",
            "phone" => "required|size:11",
            "address" => "required|min:15|max:100",
            "facebook_url" => "unique:profiles,facebook_url",
            "twitter_url" => "unique:profiles,twitter_url",
            "instagram_url" => "unique:profiles,instagram_url",
        ]);

        $employee = Employee::create([
            "name" => $request->input('name'),
            "job_title" => $request->input('job_title'),
            "phone" => $request->input('phone'),
            "address" => $request->input('address'),
        ]);

        Profile::create([
            "facebook_url" => $request->input('facebook_url'),
            "twitter_url" => $request->input('twitter_url'),
            "instagram_url" => $request->input('instagram_url'),
            "employee_id" => '11',
        ]);

        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', ['employee' => $employee]);
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
            "name" => "required|min:3|max:100",
            "job_title" => "required|min:3|max:100",
            "phone" => "required|size:11",
            "address" => "required|min:15|max:100",
        ]);

        $newEmployee = Employee::where('id', $employee->id)
            ->update([
                "name" => $request->input('name'),
                "job_title" => $request->input('job_title'),
                "phone" => $request->input('phone'),
                "address" => $request->input('address'),
            ]);

        Profile::where('employee_id', $employee->id)
            ->update([
                "facebook_url" => $request->input('facebook_url'),
                "twitter_url" => $request->input('twitter_url'),
                "instagram_url" => $request->input('instagram_url'),
                "employee_id" => $employee->id,
            ]);

        return redirect()->route('admin.employees.edit', ['employee' => $employee->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

        $profile = Profile::where('employee_id', $employee->id);

        $profile->delete();
        $employee->delete();

        return redirect()->route('admin.employees.index');
    }
}
