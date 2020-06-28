<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\ReligionRequest;

interface ReligionRepositoryInterface {

    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(ReligionRequest $request);
    public function update(ReligionRequest $request, int $id);
    public function delete(int $id);
}
