<?php

namespace App\Http\Controllers\Master;

use App\Repositories\Master\Interfaces\MaritalRepositoryInterface;
use App\Http\Requests\MaritalRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Marital;
use Session;

class MaritalController extends Controller
{
    private $maritalRepository;

    public function __construct(MaritalRepositoryInterface $maritalRepository) {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'marital');

        $this->maritalRepository = $maritalRepository;
    }

    public function index() {
        $title      = "Daftar Status Pernikahan";
        $marital    = $this->maritalRepository->paginate(5);

        return view('master.marital.index', compact(['title', 'marital']));
    }

    public function create() {
        $title      = "Tambah Data Status Pernikahan";

        return view('master.marital.create', compact('title'));
    }

    public function store(MaritalRequest $request) {
        $marital    = $this->maritalRepository->create($request);

        return redirect('master/marital')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Status Pernikahan";
        $marital    = $this->maritalRepository->findById($id);

        if($marital) {
            return view('master.marital.edit', compact(['title', 'marital']));
        }
        else {
            return redirect('master/marital')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(MaritalRequest $request, $id) {
        $marital = $this->maritalRepository->update($request, $id);

        if($marital) {
            return redirect('master/marital')->with(['success' => 'Data berhasil diubah!']);
        }
        else {
            return redirect('master/marital')->with(['error' => 'Data gagal diubah!']);
        }
    }

    public function destroy($id) {
        $marital    = $this->maritalRepository->delete($id);

        if($marital) {
            return redirect('master/marital')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/marital')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
