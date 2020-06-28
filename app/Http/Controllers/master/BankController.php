<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\BankRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Bank;
use Session;
use App\Repositories\Master\Interfaces\BankRepositoryInterface;

class BankController extends Controller
{
    private $bankRepository;

    public function __construct(BankRepositoryInterface $bankRepository) {
        // set session for navbar
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'bank');

        $this->bankRepository = $bankRepository;
    }

    public function index() {
        $bank = $this->bankRepository->paginate(5);

        return view('master.bank.index', compact('bank'));
    }

    public function create() {
        $title = "Tambah Data Bank";

        return view('master.bank.create', compact('title'));
    }

    public function store(BankRequest $request) {
        $bank = $this->bankRepository->create($request);

        return redirect('master/bank')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title  = "Ubah Data Bank";
        $bank   = $this->bankRepository->findById($id);

        return view('master.bank.edit', compact(['bank', 'title']));
    }

    public function update(BankRequest $request, $id) {
        $bank = $this->bankRepository->update($request, $id);

        return redirect('master/bank')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $bank = $this->bankRepository->delete($id);

        if($bank) {
            return redirect('master/bank')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/bank')->with(['error' => 'Data gagal dihapus!']);
        }
    }

}
