<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\MaritalRequest;

interface MaritalRepositoryInterface {

    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(MaritalRequest $request);
    public function update(MaritalRequest $request, int $id);
    public function delete(int $id);
}
