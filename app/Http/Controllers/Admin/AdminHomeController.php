<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;

class AdminHomeController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function company(){
        $companies = Company::get();
        return view('admin.company', compact('companies'));
    }
    public function candidate(){
        $candidates = Candidate::get();
        return view('admin.candidate', compact('candidates'));
    }

    public function job(){
        $jobs = Job::with('rCompany','rJobLocation')->get();
        return view('admin.job_manager', compact('jobs'));
    }
    public function job_status($id){
        $job = Job::find($id);
        if($job){
            if($job->status){
                $job->status = 0;
            }
            else{
                $job->status = 1;
            }
        $job->save();
        }
        return back();
    }
    public function company_status($id){
        $job = Company::find($id);
        $data = Job::where('company_id', $id)->get();
        

        if($job){
            if($job->status){
                $job->status = 0;
                foreach($data as $item){
                    $item->status = 0;
                    $item->save();
                }

            }
            else{
                $job->status = 1;

                foreach($data as $item){
                    $item->status = 1;
                    $item->save();
                }
            }
        $job->save();
        }

        if($job->status == 1){
             
        }
        return back();
    }
    public function candidate_status($id){
        $job = Candidate::find($id);
        if($job){
            if($job->status){
                $job->status = 0;
            }
            else{
                $job->status = 1;
            }
        $job->save();
        }
        return back();
    }
    
}
