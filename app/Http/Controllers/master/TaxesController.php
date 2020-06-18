<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\TaxesRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\Taxes;
use App\Model\Master\Marital;
use Session;

class TaxesController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'taxes');
    }

    public function index() {
        $title      = "Daftar Data Perpajakan";
        $taxes      = Taxes::orderBy('id', 'ASC')->paginate(10);

        return view('master.taxes.index', compact(['title', 'taxes']));
    }

    public function create() {
        $title      = "Tambah Data Perpajakan";
        $marital    = Marital::all();

        return view('master.taxes.create', compact(['title', 'marital']));
    }

    public function store(TaxesRequest $request) {
        $taxes      = Taxes::create($request->all());

        return redirect('master/taxes')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Perpajakan";
        $taxes      = Taxes::with('marital')->findOrFail($id);
        $marital    = Marital::all();

        if($taxes) {
            return view('master.taxes.edit', compact(['title', 'taxes', 'marital']));
        }
        else {
            return redirect('master/taxes')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(TaxesRequest $request, Taxes $taxes) {
        $taxes->update();

        return redirect('master/taxes')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $taxes      = Taxes::findOrFail($id);

        if($taxes) {
            $taxes->delete();

            return redirect('master/taxes')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/taxes')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
