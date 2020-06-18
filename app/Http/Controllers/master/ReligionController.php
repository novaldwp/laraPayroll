<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\ReligionRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Religion;
use Session;

class ReligionController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'religion');
    }

    public function index() {
        $title      = "Daftar Agama";
        $religion   = Religion::orderBy('id', 'ASC')->paginate(10);

        return view('master.religion.index', compact(['title', 'religion']));
    }

    public function create() {
        $title      = "Tambah Data Agama";

        return view('master.religion.create', compact('title'));
    }

    public function store(ReligionRequest $request) {
        $religion   = Religion::create($request->all());

        return redirect('master/religion')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Agama";
        $religion   = Religion::findOrFail($id);

        if($religion) {
            return view('master.religion.edit', compact(['title', 'religion']));
        }
        else {
            return redirect('master/religion')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(ReligionRequest $request, Religion $religion) {
        $religion->update($request->all());

        return redirect('master/religion')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $religion   = Religion::findOrFail($id);

        if($religion) {
            $religion->delete();

            return redirect('master/religion')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/religion')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
