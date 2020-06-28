<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\DesignationRequest;

interface DesignationRepositoryInterface {
    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(DesignationRequest $request);
    public function update(DesignationRequest $request, int $id);
    public function delete(int $id);
    public function getDepartment();
}
