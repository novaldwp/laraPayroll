<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\GenderRequest;

interface GenderRepositoryInterface {

    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(GenderRequest $request);
    public function update(GenderRequest $request, int $id);
    public function delete(int $id);
}
