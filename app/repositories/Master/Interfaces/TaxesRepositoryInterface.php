<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\TaxesRequest;

interface TaxesRepositoryInterface {
    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(TaxesRequest $request);
    public function update(TaxesRequest $request, int $id);
    public function delete(int $id);
    public function getMarital();
}
