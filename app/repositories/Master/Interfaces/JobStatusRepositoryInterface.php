<?php

namespace App\Repositories\Master\Interfaces;

use App\Http\Requests\JobStatusRequest;

interface JobStatusRepositoryInterface {

    public function paginate(int $perPage);
    public function findById(int $id);
    public function create(JobStatusRequest $request);
    public function update(JobStatusRequest $request, int $id);
    public function delete(int $id);
}
