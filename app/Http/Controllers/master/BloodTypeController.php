<?php

namespace App\Http\Controllers\Master;

use App\Repositories\Master\Interfaces\BloodTypeRepositoryInterface;
use App\Http\Requests\BloodTypeRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\BloodType;
use Session;

class BloodTypeController extends Controller
{
    private $bloodType;

    public function __construct(BloodTypeRepositoryInterface $bloodType) {
        // set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'bloodtype');

        $this->bloodType = $bloodType;
    }

    public function index() {
        $title = "Daftar Golongan Darah";

        $blood = $this->bloodType->paginate(5);

        return view('master.bloodtype.index', compact(['title', 'blood']));
    }

    public function create() {
        $title  = "Tambah Golongan Darah";

        return view('master.bloodtype.create', compact(['title']));
    }

    public function store(BloodTypeRequest $request) {
        $blood  = $this->bloodType->create($request);

        return redirect('master/blood-type')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title  = "Ubah Golongan Darah";
        $blood  = $this->bloodType->findById($id);

        return view('master.bloodtype.edit', compact(['blood', 'title']));
    }

    public function update(BloodTypeRequest $request, $id) {
        $blood = $this->bloodType->update($request, $id);

        return redirect('master/blood-type')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $blood  = $this->bloodType->delete($id);

        if($blood) {
            return redirect('master/blood-type')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/blood-type')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
