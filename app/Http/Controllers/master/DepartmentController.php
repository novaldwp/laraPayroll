<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Department;
use Session;

class DepartmentController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'department');
    }

    public function index() {
        $title      = "Daftar Divisi";
        $department = Department::orderBy('name', 'ASC')->paginate(10);

        return view('master.department.index', compact(['title', 'department']));
    }

    public function create() {
        $title      = "Tambah Divisi Baru";

        return view('master.department.create', compact('title'));
    }

    public function store(DepartmentRequest $request) {
        $department = Department::create($request->all());

        return redirect('master/department')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Divisi";
        $department = Department::findOrFail($id);

        if($department) {
            return view('master.department.edit', compact(['title', 'department']));
        }
        else {
            return redirect('master/department')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(DepartmentRequest $request, Department $department) {
        $department->update($request->all());

        return redirect('master/department')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $department = Department::findOrFail($id);

        if($department) {
            $department->delete();

            return redirect('master/department')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/department')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
