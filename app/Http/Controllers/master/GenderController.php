<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\GenderRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Gender;
use Session;

class GenderController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'gender');
    }

    public function index() {
        $title  = "Daftar Jenis Kelamin";
        $gender = Gender::orderBy('name', 'ASC')->paginate(10);

        return view('master.gender.index', compact(['title', 'gender']));
    }

    public function create() {
        $title  = "Tambah Data Jenis Kelamin";

        return view('master.gender.create', compact('title'));
    }

    public function store(GenderRequest $request) {
        $gender = Gender::create($request->all());

        return redirect('master/gender')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title  = "Ubah Data Jenis Kelamin";
        $gender = Gender::findOrFail($id);

        if($gender) {
            return view('master.gender.edit', compact(['title', 'gender']));
        }
        else {
            return redirect('master/gender/')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(GenderRequest $request, Gender $gender) {
        $gender->update($request->all());

        return redirect('master/gender')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $gender = Gender::findOrFail($id);

        if($gender) {
            $gender->delete();

            return redirect('master/gender')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/gender')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
