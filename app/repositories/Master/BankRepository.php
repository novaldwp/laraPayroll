<?php

namespace App\Repositories\Master;

use App\Repositories\Master\Interfaces\BankRepositoryInterface;
use App\Http\Requests\BankRequest;
use App\Model\Master\Bank;

class BankRepository implements BankRepositoryInterface {

    public function paginate($perPage) {
        $bank = Bank::orderBy('id', 'DESC')->paginate($perPage);

        return $bank;
    }

    public function findById($id) {
        $bank = Bank::findOrFail($id);

        return $bank;
    }

    public function create(BankRequest $request) {
        $bank = Bank::create($request->all());

        return $bank;
    }

    public function update(BankRequest $request, $id) {
        $bank = $this->findById($id);
        $bank->update($request->all());

        return $bank;
    }

    public function delete($id) {
        $bank = $this->findById($id);
        $bank->delete();

        return $bank;
    }
}
