<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\BankRequest;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Master\Bank;

class BankController extends Controller
{
    public function __construct() {
        // set session for navbar
        Session::put('nav_active', 'master');
        Session::put('sub_active', 'bank');
    }

    public function index() {
        $bank = Bank::orderBy('id', 'DESC')->paginate(5);

        return view('master.bank.index', compact('bank'));
    }

    public function create() {
        $title = "Tambah Data Bank";

        return view('master.bank.create', compact('title'));
    }

    public function store(BankRequest $request) {
        $bank = Bank::create($request->all());

        return redirect('master/bank')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title  = "Ubah Data Bank";
        $bank   = Bank::findOrFail($id);

        return view('master.bank.edit', compact(['bank', 'title']));
    }

    public function update(BankRequest $request, Bank $bank) {
        $bank->update($request->all());

        return redirect('master/bank')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $bank = Bank::findOrFail($id);

        if($bank) {
            $bank->delete();

            return redirect('master/bank')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/bank')->with(['error' => 'Data gagal dihapus!']);
        }
    }

}
