<?php

namespace App\Repositories\Master;

use App\Model\Master\Designation;
use App\Model\MAster\Department;
use App\Repositories\Master\Interfaces\DesignationRepositoryInterface;
use App\Http\Requests\DesignationRequest;

class DesignationRepository implements DesignationRepositoryInterface {

    public function paginate($perPage) {
        $designation = Designation::orderBy('id', 'DESC')->paginate($perPage);

        return $designation;
    }

    public function findById($id) {
        $designation = Designation::findOrFail($id);

        return $designation;
    }

    public function create(DesignationRequest $request) {
        $designation = Designation::create($request->all());

        return $designation;
    }

    public function update(DesignationRequest $request, $id) {
        $designation = $this->findById($id);
        $designation->update($request->all());

        return $designation;
    }

    public function delete($id) {
        $designation = $this->findById($id);
        $designation->delete();

        return $designation;
    }

    public function getDepartment() {
        $department = Department::orderBy('name', 'ASC')->get();

        return $department;
    }
}
