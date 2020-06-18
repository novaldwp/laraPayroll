<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\MaritalRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Marital;
use Session;

class MaritalController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'marital');
    }

    public function index() {
        $title      = "Daftar Status Pernikahan";
        $marital    = Marital::orderBy('id', 'ASC')->paginate(10);

        return view('master.marital.index', compact(['title', 'marital']));
    }

    public function create() {
        $title      = "Tambah Data Status Pernikahan";

        return view('master.marital.create', compact('title'));
    }

    public function store(MaritalRequest $request) {
        $marital    = Marital::create($request->all());

        return redirect('master/marital')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Status Pernikahan";
        $marital    = Marital::findOrFail($id);

        if($marital) {
            return view('master.marital.edit', compact(['title', 'marital']));
        }
        else {
            return redirect('master/marital')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(MaritalRequest $request, Marital $marital) {
        $marital->update($request->all());

        return redirect('master/marital')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function destroy($id) {
        $marital    = Marital::findOrFail($id);
        $marital->delete();  

        if($marital) {
            $marital->delete();

            return redirect('master/marital')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/marital')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
