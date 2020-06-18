<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\JobStatusRequest;
use App\Http\Controllers\Controller;
use App\Model\Master\JobStatus;
use Session;

class JobStatusController extends Controller
{
    public function __construct() {
        //set navbar session
        Session::forget('nav_active');
        Session::forget('sub_active');

        Session::put('nav_active', 'master');
        Session::put('sub_active', 'jobstatus');
    }

    public function index() {
        $title      = "Daftar Status Kerja";
        $jobstatus  = JobStatus::orderBy('id', 'ASC')->paginate(10);

        return view('master.jobstatus.index', compact(['title', 'jobstatus']));
    }

    public function create() {
        $title      = "Tambah Data Status Kerja";

        return view('master.jobstatus.create', compact('title'));
    }

    public function store(JobStatusRequest $request) {
        $jobstatus  = JobStatus::create($request->all());

        return redirect('master/job-status')->with(['success' => 'Data berhasil ditambahkan!']);
    }

    public function edit($id) {
        $title      = "Ubah Data Status Kerja";
        $jobstatus  = JobStatus::findOrFail($id);
        
        if($jobstatus) {
            return view('master.jobstatus.edit', compact(['title', 'jobstatus']));
        }
        else {
            return redirect('master/job-status')->with(['error' => 'Data tidak ditemukan!']);
        }
    }

    public function update(JobStatusRequest $request, JobStatus $jobstatus) {
        $jobstatus->update($request->all());

        return redirect('master/job-status')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id) {
        $jobstatus  = JobStatus::findOrFail($id);
       
        if($jobstatus) {
            $jobstatus->delete();

            return redirect('master/job-status')->with(['success' => 'Data berhasil dihapus!']);
        }
        else {
            return redirect('master/job-status')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
