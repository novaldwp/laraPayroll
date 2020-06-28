<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\BankRequest;

interface BankRepositoryInterface {

    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(BankRequest $request);
    public function update(BankRequest $request, int $id);
    public function delete(int $id);
}
