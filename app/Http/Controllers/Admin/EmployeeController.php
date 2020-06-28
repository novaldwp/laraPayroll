<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Employee\Employee;
use App\Model\Employee\JobHistory;
use App\Model\Employee\EmergencyContact;
use Session;

class EmployeeController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'employee');
    }

    public function index() {
        $title      = "Daftar Data Karyawan";
        $employee   = Employee::orderBy('id', 'DESC')->paginate(10);

        return view('admin.employee.index', compact(['employee', 'title']));
    }

    public function create() {
        $title      = "Tambah Data Karyawan";

        return view('admin.employee.create', compact('title'));
    }

    public function store(Request $request) {
        $employee   = Employee::create($request->all());

        return redirect('employee')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Karyawan";
        $employee   = Employee::findOrFail($id);

        return view('admin.employe.edit', compact(['title', 'employee']));
    }

    public function update($id, Request $request) {
        $employee   = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect('employee')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $employee   = Employee::findOrFail($id);
        $employe->delete();

        return redirect('employee')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function show($id) {
        $title      = "Detail Data Karyawan";
        $employee   = Employee::findOrFail($id);

        return view('admin.employee.detail', compact(['title', 'employee']));
    }
}
