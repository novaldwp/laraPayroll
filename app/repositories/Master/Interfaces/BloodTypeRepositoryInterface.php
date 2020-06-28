<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\BloodTypeRequest;

interface BloodTypeRepositoryInterface {

    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(BloodTypeRequest $request);
    public function update(BloodTypeRequest $request, int $id);
    public function delete(int $id);
}
