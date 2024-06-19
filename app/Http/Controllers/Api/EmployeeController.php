<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json(['employees' => $employees]);
    }

    public function show(Employee $employee)
    {
        return response()->json(['employee' => $employee]);
    }

    public function store(Request $request)
    {
        // validate the request
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);
        $employee = Employee::create($validated);
        return response()->json(['message' => 'Pegawai berhasil di tambahkan', 'employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        // validate the request
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);
        $employee->update($validated);
        return response()->json(['message' => 'Pegawai berhasil di update', 'employee' => $employee]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Pegawai berhasil di hapus']);
    }
}
