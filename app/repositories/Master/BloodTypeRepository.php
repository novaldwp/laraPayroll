<?php

namespace App\Repositories\Master;

use App\Repositories\Master\Interfaces\BloodTypeRepositoryInterface;
use App\Http\Requests\BloodTypeRequest;
use App\Model\Master\BloodType;

class BloodTypeRepository implements BloodTypeRepositoryInterface {

    public function paginate($perPage) {
        $blood = BloodType::orderBy('id', 'DESC')->paginate($perPage);

        return $blood;
    }

    public function findById($id) {
        $blood = BloodType::findOrFail($id);

        return $blood;
    }

    public function create(BloodTypeRequest $request) {
        $blood = BloodType::create($request->all());

        return $blood;
    }

    public function update(BloodTypeRequest $request, $id) {
        $blood = $this->findById($id);
        $blood->update($request->all());

        return $blood;
    }

    public function delete($id) {
        $blood = $this->findById($id);
        $blood->delete();

        return $blood;
    }
}
