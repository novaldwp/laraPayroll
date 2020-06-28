<?php

namespace APp\Repositories\Master;

use App\Model\Master\Taxes;
use App\Model\Master\Marital;
use App\Http\Requests\TaxesRequest;
use App\Repositories\Master\Interfaces\TaxesRepositoryInterface;

class TaxesRepository implements TaxesRepositoryInterface {

    public function paginate($perPage) {
        $taxes = Taxes::orderBy('id', 'DESC')->paginate($perPage);

        return $taxes;
    }

    public function findById($id) {
        $taxes = Taxes::findOrFail($id);

        return $taxes;
    }

    public function create(TaxesRequest $request) {
        $taxes = Taxes::create($request->all());

        return $taxes;
    }

    public function update(TaxesRequest $request, $id) {
        $taxes = $this->findById($id);
        $taxes->update($request->all());

        return $taxes;
    }

    public function delete($id) {
        $taxes = $this->findById($id);
        $taxes->delete();

        return $taxes;
    }

    public function getMarital() {
        $marital = Marital::orderBy('name', 'ASC')->get();

        return $marital;
    }
}
