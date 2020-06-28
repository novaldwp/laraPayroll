<?php

namespace App\Repositories\Master;

use App\Repositories\Master\Interfaces\DepartmentRepositoryInterface;
use App\Model\Master\Department;
use App\Http\Requests\DepartmentRequest;

class DepartmentRepository implements DepartmentRepositoryInterface {
    public function paginate($perPage) {
        $department = Department::orderBy('id', 'DESC')->paginate($perPage);

        return $department;
    }

    public function findById($id) {
        $department = Department::findOrFail($id);

        return $department;
    }

    public function create(DepartmentRequest $request) {
        $department = Department::create($request->all());

        return $department;
    }

    public function update(DepartmentRequest $request, $id) {
        $department = $this->findById($id);
        $department->update($request->all());

        return $department;
    }

    public function delete($id) {
        $department = $this->findById($id);
        $department->delete();

        return $department;
    }
}
