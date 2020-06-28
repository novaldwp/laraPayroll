<?php

namespace App\Repositories\Master;

use App\Model\Master\Marital;
use App\Http\Requests\MaritalRequest;
use App\Repositories\Master\Interfaces\MaritalRepositoryInterface;

class MaritalRepository implements MaritalRepositoryInterface {

    public function paginate($perPage) {
        $marital = Marital::orderBy('id', 'DESC')->paginate($perPage);

        return $marital;
    }

    public function findById($id) {
        $marital = Marital::findOrFail($id);

        return $marital;
    }

    public function create(MaritalRequest $request) {
        $marital = Marital::create($request->all());

        return $marital;
    }

    public function update(MaritalRequest $request, $id) {
        $marital = $this->findById($id);
        $marital->update($request->all());

        return $marital;
    }

    public function delete($id) {
        $marital = $this->findById($id);
        $marital->delete();

        return $marital;
    }
}
