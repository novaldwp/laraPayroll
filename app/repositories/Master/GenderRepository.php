<?php

namespace App\Repositories\Master;

use App\Repositories\Master\Interfaces\GenderRepositoryInterface;
use App\Http\Requests\GenderRequest;
use App\Model\Master\Gender;

class GenderRepository implements GenderRepositoryInterface {

    public function paginate($perPage) {
        return Gender::orderBy('id', 'ASC')->paginate($perPage);
    }

    public function findById($id) {
        return Gender::findOrFail($id);
    }

    public function create(GenderRequest $request) {
        return $gender = Gender::create($request->all());
    }

    public function update(GenderRequest $request, $id) {
        $gender = $this->findById($id);

        return $gender->update($request->all());
    }

    public function delete($id) {
        $gender = $this->findById($id);
        return $gender->delete();
    }
}
