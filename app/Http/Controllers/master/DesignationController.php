<?php

namespace App\Http\Controllers\Master;

use App\Repositories\master\Interfaces\DesignationRepositoryInterface;
use App\Http\Requests\DesignationRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Department;
use App\Model\Master\Designation;
use Session;

class DesignationController extends Controller
{
    private $designationRepository;

    public function __construct(DesignationRepositoryInterface $designationRepository) {
        //set navbar session
        Session::forget('nav_acitve');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'designation');

        $this->designationRepository = $designationRepository;
    }

    public function index() {
        $title          = "Daftar Posisi";
        $designation    = $this->designationRepository->paginate(5);

        return view('master.designation.index', compact(['title', 'designation']));
    }

    public function create() {
        $title          = "Tambah Posisi Baru";
        $department     = Department::all()->dd();

        return view('master.designation.create', compact(['title', 'department']));
    }

    public function store(DesignationRequest $request) {
        $designation    = $this->designationRepository->create($request);

        if($designation) {
            return redirect('master/designation')->with(['success' => 'Data berhasil ditambahkan!']);
        }
        else {
            return redirect('master/designation')->with(['error' => 'Data gagal ditambahkan!']);
        }
    }

    public function edit($id) {
        $title          = "Ubah Data Posisi";
        $designation    = $this->designationRepository->findById($id);
        $department     = $this->designationRepository->getDepartment();

        if($designation) {
            return view('master.designation.edit', compact(['title', 'designation', 'department']));
        }
        else {
            return redirect('master/designation')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(DesignationRequest $request, $id) {
        $designation    = $this->designationRepository->update($request, $id);

        if($designation) {
            return redirect('master/designation')->with(['success' => 'Data berhasil diubah!']);
        }
        else {
            return redirect('master/designation')->with(['error' => 'Data gagal diubah!']);
        }
    }

    public function destroy($id) {
        $designation    = $this->designationRepository->delete($id);

        if($designation) {
            return redirect('master/designation')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/designation')->with(['error' => 'Data tidak ditemukan!']);
        }
    }
}
