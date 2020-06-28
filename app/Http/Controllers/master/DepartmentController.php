<?php

namespace App\Http\Controllers\Master;

use App\Repositories\Master\Interfaces\DepartmentRepositoryInterface;
use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Department;
use Session;

class DepartmentController extends Controller
{
    private $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository) {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'department');

        $this->departmentRepository = $departmentRepository;
    }

    public function index() {
        $title      = "Daftar Divisi";
        $department = $this->departmentRepository->paginate(5);

        return view('master.department.index', compact(['title', 'department']));
    }

    public function create() {
        $title      = "Tambah Divisi Baru";

        return view('master.department.create', compact('title'));
    }

    public function store(DepartmentRequest $request) {
        $department = $this->departmentRepository->create($request);

        return redirect('master/department')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Divisi";
        $department = $this->departmentRepository->findById($id);

        if($department) {
            return view('master.department.edit', compact(['title', 'department']));
        }
        else {
            return redirect('master/department')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(DepartmentRequest $request, $id) {
        $department = $this->departmentRepository->update($request, $id);

        return redirect('master/department')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $department = $this->departmentRepository->delete($id);

        if($department) {
            return redirect('master/department')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/department')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
