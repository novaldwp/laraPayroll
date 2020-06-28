<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\DepartmentRequest;

interface DepartmentRepositoryInterface {
    public function paginate(int $id);
    public function findById(int $id);
    public function create(DepartmentRequest $request);
    public function update(DepartmentRequest $request, int $id);
    public function delete(int $id);
}
