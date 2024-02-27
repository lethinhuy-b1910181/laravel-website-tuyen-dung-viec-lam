<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Job;
use App\Models\CompanyPhoto;

use App\Models\CompanyVideo;
use App\Models\CompanySize;
use App\Models\CompanyLocation;
use App\Models\CompanyIndustry;
use App\Models\PageHomeItem;

use Carbon\Carbon;

class CompanyListController extends Controller
{
    // public function index(Request $request){

    //     $job_categories = JobCategory::orderBy('name', 'asc')->get();
    //     $job_locations = JobLocation::orderBy('name', 'asc')->get();
    //     $job_types = JobType::orderBy('name', 'asc')->get();
    //     $job_salaries = JobSalary::orderBy('name', 'asc')->get();
    //     $job_genders = JobGender::orderBy('name', 'asc')->get();
    //     $job_experiences = JobExperience::orderBy('name', 'asc')->get();

    //     $form_title = $request->title;
    //     $form_location = $request->location;
    //     $form_category = $request->category;
    //     $form_type = $request->type;
    //     $form_salary = $request->salary;
    //     $form_gender = $request->gender;
    //     $form_experience = $request->experience;

    //     $jobs = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience')->orderBy('id', 'desc');

    //     if($request->title != null){
    //         $jobs = $jobs->where('title','LIKE', '%'.$request->title.'%' );
    //     }

    //     if($request->location != null){
    //         $jobs = $jobs->where('job_location_id', $request->location );
    //     }

    //     if($request->category != null){
    //         $jobs = $jobs->where('job_category_id', $request->category );
    //     }
    //     if($request->type != null){
    //         $jobs = $jobs->where('job_type_id', $request->type );
    //     }
    //     if($request->experience != null){
    //         $jobs = $jobs->where('job_experience_id', $request->experience );
    //     }
    //     if($request->gender != null){
    //         $jobs = $jobs->where('job_gender_id', $request->gender );
    //     }
    //     if($request->salary != null){
    //         $jobs = $jobs->where('job_salary_id', $request->salary );
    //     }

    //     $jobs = $jobs->paginate(1);
    //     $jobs = $jobs->appends($request->all());

    //     return view('front.company_list', compact('jobs', 'job_categories', 'job_locations',
    //      'form_title', 'form_category', 'form_location', 'job_types', 'job_genders', 
    //      'job_salaries', 'job_experiences', 'form_type', 'form_salary', 'form_gender', 
    //      'form_experience'));
    //  }

    public function index(Request $request){
        $home_page_data = PageHomeItem::where('id',1)->first();
        $company_size = CompanySize::orderBy('id', 'desc')->get();
        
        $company_industry = CompanyIndustry::orderBy('name', 'desc')->get();
        $company_location = CompanyLocation::orderBy('id', 'desc')->get();

        $form_title = $request->title;
        $form_location = $request->location;
        $form_industry = $request->industry;

        $company = Company::orderBy('company_name', 'desc');
        if($request->title != null){
            $company->where('company_name', 'LIKE' , '%'.$request->title.'%');
        }
        if($request->location != null){
            $company->where('company_location_id', $request->location);
        }
        if($request->industry != null){
            $company->where('company_industry_id',$request->industry);
        }
        $company = $company->get();
        // $company = $company->appends($request->all());
        return view('front.company_list', compact('company','home_page_data', 'company_size', 'company_industry', 'company_location', 'form_title', 'form_location', 'form_industry'));
    }

    public function detail($id){

        $company = Company::withCount('rJob')->with('rCompanyIndustry','rCompanyLocation', 'rCompanySize')->where('id',$id)->first();
        $company_photos = CompanyPhoto::where('company_id',$company->id)->get();

        
        $today = Carbon::now(); 
        $jobs = Job::with('rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalary')->where('company_id',$company->id)->whereDate('deadline', '>=', $today->toDateString())->get();
   
        $company_filed = Company::where('company_industry_id', $company->company_industry_id)->where('id', '!=',  $id)->get();
        $jobCounts = [];
        foreach ($company_filed as $item) {
            $jobCounts[$item->id] = $item->rJob->count();
        }

        return view('front.company',compact('company','company_filed', 'company_photos', 'jobs', 'jobCounts'));
    
    }
}
