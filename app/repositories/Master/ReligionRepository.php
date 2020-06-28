<?php

namespace App\Repositories\Master;

use App\Model\Master\Religion;
use App\Http\Requests\ReligionRequest;
use App\Repositories\Master\Interfaces\ReligionRepositoryInterface;

class ReligionRepository implements ReligionRepositoryInterface {

    public function paginate($perPage) {
        $religion = Religion::orderBy('id', 'DESC')->paginate($perPage);

        return $religion;
    }

    public function findById($id) {
        $religion = Religion::findOrFail($id);

        return $religion;
    }

    public function create(ReligionRequest $request) {
        $religion = Religion::create($request->all());

        return $religion;
    }

    public function update(ReligionRequest $request, $id) {
        $religion = $this->findById($id);
        $religion->update($request->all());

        return $religion;
    }

    public function delete($id) {
        $religion = $this->findById($id);
        $religion->delete();

        return $religion;
    }
}
