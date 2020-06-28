<?php

namespace App\Http\Controllers\Master;

use App\Repositories\Master\Interfaces\JobStatusRepositoryInterface;
use App\Http\Requests\JobStatusRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\JobStatus;
use Session;

class JobStatusController extends Controller
{
    private $jobStatusRepository;

    public function __construct(JobStatusRepositoryInterface $jobStatusRepository) {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'jobstatus');

        $this->jobStatusRepository = $jobStatusRepository;
    }

    public function index() {
        $title      = "Daftar Status Kerja";
        $jobstatus  = $this->jobStatusRepository->paginate(5);

        return view('master.jobstatus.index', compact(['title', 'jobstatus']));
    }

    public function create() {
        $title      = "Tambah Data Status Kerja";

        return view('master.jobstatus.create', compact('title'));
    }

    public function store(JobStatusRequest $request) {
        $jobstatus  = $this->jobStatusRepository->create($request);

        return redirect('master/job-status')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Status Kerja";
        $jobstatus  = $this->jobStatusRepository->findById($id);

        if($jobstatus) {
            return view('master.jobstatus.edit', compact(['title', 'jobstatus']));
        }
        else {
            return redirect('master/job-status')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(JobStatusRequest $request, $id) {
        $jobstatus = $this->jobStatusRepository->update($request, $id);

        return redirect('master/job-status')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $jobstatus  = $this->jobStatusRepository->delete($id);

        if($jobstatus) {
            return redirect('master/job-status')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/job-status')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
