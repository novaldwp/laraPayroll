<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Master\Department;
use App\Model\Master\Designation;
use Session;

class DesignationController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_acitve');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'designation');
    }

    public function index() {
        $title          = "Daftar Posisi";
        $designation    = Designation::with('department')->orderBy('id', 'ASC')->paginate(10);

        return view('master.designation.index', compact(['title', 'designation']));
    }

    public function create() {
        $title          = "Tambah Posisi Baru";
        $department     = Department::all();

        return view('master.designation.create', compact(['title', 'department']));
    }

    public function store(Request $request) {
        $designation    = Designation::create($request->all());

        if($designation) {
            return redirect('master/designation')->with(['success' => 'Data berhasil ditambahkan!']);
        }
        else {
            return redirect('master/designation')->with(['error' => 'Data gagal ditambahkan!']);
        }
    }

    public function edit($id) {
        $title          = "Ubah Data Posisi";
        $designation    = Designation::findOrFail($id);

        if($designation) {
            return view('master.designation.edit', compact(['title', 'designation']));
        }
        else {
            return redirect('master/designation')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function destroy($id) {
        $designation    = Designation::findOrFail($id);

        if($designation) {
            $designation->delete();
            return redirect('master/designation')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/designation')->with(['error' => 'Data tidak ditemukan!']);
        }
    }
}
