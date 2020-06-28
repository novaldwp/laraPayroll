<?php

namespace App\Http\Controllers\Master;

use App\Repositories\Master\interfaces\TaxesRepositoryInterface;
use App\Http\Requests\TaxesRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Taxes;
use App\Model\Master\Marital;
use Session;

class TaxesController extends Controller
{
    private $taxesRepository;

    public function __construct(TaxesRepositoryInterface $taxesRepository) {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'taxes');

        $this->taxesRepository = $taxesRepository;
    }

    public function index() {
        $title      = "Daftar Data Perpajakan";
        $taxes      = $this->taxesRepository->paginate(5);

        return view('master.taxes.index', compact(['title', 'taxes']));
    }

    public function create() {
        $title      = "Tambah Data Perpajakan";
        $marital    = $this->taxesRepository->getMarital();

        return view('master.taxes.create', compact(['title', 'marital']));
    }

    public function store(TaxesRequest $request) {
        $taxes      = $this->taxesRepository->create($request);

        return redirect('master/taxes')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Perpajakan";
        $taxes      = $this->taxesRepository->findById($id);
        $marital    = $this->taxesRepository->getMarital();

        if($taxes) {
            return view('master.taxes.edit', compact(['title', 'taxes', 'marital']));
        }
        else {
            return redirect('master/taxes')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(TaxesRequest $request, $id) {
        $taxes = $this->taxesRepository->update($request, $id);

        if($taxes) {
            return redirect('master/taxes')->with(['success' => 'Data berhasil diubah!']);
        }
        else {
            return redirect('master/taxes')->with(['success' => 'Data gagal diubah!']);
        }
    }

    public function destroy($id) {
        $taxes      = $this->taxesRepository->delete($id);

        if($taxes) {
            return redirect('master/taxes')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/taxes')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
