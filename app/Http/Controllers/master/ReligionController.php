<?php

namespace App\Http\Controllers\Master;

use App\Repositories\Master\Interfaces\ReligionRepositoryInterface;
use App\Http\Requests\ReligionRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Religion;
use Session;

class ReligionController extends Controller
{
    private $religionRepository;

    public function __construct(ReligionRepositoryInterface $religionRepository) {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'religion');

        $this->religionRepository = $religionRepository;
    }

    public function index() {
        $title      = "Daftar Agama";
        $religion   = $this->religionRepository->paginate(5);

        return view('master.religion.index', compact(['title', 'religion']));
    }

    public function create() {
        $title      = "Tambah Data Agama";

        return view('master.religion.create', compact('title'));
    }

    public function store(ReligionRequest $request) {
        $religion   = $this->religionRepository->create($request);

        return redirect('master/religion')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Agama";
        $religion   = $this->religionRepository->findById($id);

        if($religion) {
            return view('master.religion.edit', compact(['title', 'religion']));
        }
        else {
            return redirect('master/religion')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(ReligionRequest $request, $id) {
        $religion = $this->religionRepository->update($request, $id);

        if($religion) {
            return redirect('master/religion')->with(['success' => 'Data berhasil diubah!']);
        }
        else {
            return redirect('master/religion')->with(['error' => 'Data gagal diubah!']);
        }
    }

    public function destroy($id) {
        $religion   = $this->religionRepository->delete($id);

        if($religion) {
            return redirect('master/religion')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/religion')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
