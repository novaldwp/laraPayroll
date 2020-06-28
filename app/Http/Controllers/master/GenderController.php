<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\GenderRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Gender;
use Session;
use App\Repositories\Master\Interfaces\GenderRepositoryInterface;

class GenderController extends Controller
{
    private $genderRepository;

    public function __construct(GenderRepositoryInterface $genderRepository) {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'gender');

        $this->genderRepository = $genderRepository;
    }

    public function index() {
        $title  = "Daftar Jenis Kelamin";
        $gender = $this->genderRepository->paginate(5);

        return view('master.gender.index', compact(['title', 'gender']));
    }

    public function create() {
        $title  = "Tambah Data Jenis Kelamin";

        return view('master.gender.create', compact('title'));
    }

    public function store(GenderRequest $request) {
        $gender = $this->genderRepository->create($request);

        return redirect('master/gender')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title  = "Ubah Data Jenis Kelamin";
        $gender = $this->genderRepository->findById($id);

        if($gender) {
            return view('master.gender.edit', compact(['title', 'gender']));
        }
        else {
            return redirect('master/gender/')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(GenderRequest $request, $id) {
        $gender = $this->genderRepository->update($request, $id);

        return redirect('master/gender')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $gender = $this->genderRepository->delete($id);

        if($gender) {
            return redirect('master/gender')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/gender')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
