<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\BloodTypeRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\BloodType;
use Session;

class BloodTypeController extends Controller
{
    public function __construct() {
        // set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'bloodtype');
    }

    public function index() {
        $title = "Daftar Golongan Darah";

        $blood = BloodType::orderBy('id', 'ASC')->paginate(10);

        return view('master.bloodtype.index', compact(['title', 'blood']));
    }

    public function create() {
        $title  = "Tambah Golongan Darah";

        return view('master.bloodtype.create', compact(['title']));
    }

    public function store(BloodTypeRequest $request) {
        $blood  = BloodType::create($request->all());

        return redirect('master/blood-type')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title  = "Ubah Golongan Darah";
        $blood  = BloodType::findOrFail($id);

        return view('master.bloodtype.edit', compact(['blood', 'title']));
    }

    public function update(BloodTypeRequest $request, BloodType $blood) {
        $blood->update($request->all());

        return redirect('master/blood-type')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $blood  = BloodType::findOrFail($id);

        if($blood) {
            $blood->delete();

            return redirect('master/blood-type')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/blood-type')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
