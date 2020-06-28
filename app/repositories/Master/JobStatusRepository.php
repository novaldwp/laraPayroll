<?php

namespace App\Repositories\Master;

use App\Model\Master\JobStatus;
use App\Http\Requests\JobStatusRequest;
use App\Repositories\Master\Interfaces\JobStatusRepositoryInterface;

class JobStatusRepository implements JobStatusRepositoryInterface {

    public function paginate($perPage) {
        $jobstatus = JobStatus::orderBy('id', 'DESC')->paginate($perPage);

        return $jobstatus;
    }

    public function findById($id) {
        $jobstatus = JobStatus::findOrFail($id);

        return $jobstatus;
    }

    public function create(JobStatusRequest $request) {
        $jobstatus = JobStatus::create($request->all());

        return $jobstatus;
    }

    public function update(JobStatusRequest $request, $id) {
        $jobstatus = $this->findById($id);
        $jobstatus->update($request->all());

        return $jobstatus;
    }

    public function delete($id) {
        $jobstatus = $this->findById($id);
        $jobstatus->delete();

        return $jobstatus;
    }
}
