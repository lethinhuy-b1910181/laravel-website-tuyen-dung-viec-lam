<?php

namespace App\Http\Controllers\Front;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Pagination\Paginator;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobType;
use App\Models\JobSalary;
use App\Models\JobGender;
use App\Models\JobExperience;
use App\Models\JobNature;
use App\Models\JobLevel;
use App\Models\PageHomeItem;
class JobListController extends Controller
{
    public function index(Request $request){

        $home_page_data = PageHomeItem::where('id',1)->first();

        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_salaries = JobSalary::orderBy('name', 'asc')->get();
        $job_genders = JobGender::orderBy('name', 'asc')->get();
        $job_experiences = JobExperience::orderBy('name', 'asc')->get();
        $job_levels = JobLevel::orderBy('id', 'asc')->get();
        $job_natures = JobNature::orderBy('id', 'asc')->get();


        $form_title = $request->title;
        $form_location = $request->location;
        $form_category = $request->category;
        $form_type = $request->type;
        $form_salary = $request->salary;
        $form_nature = $request->nature;
        $form_gender = $request->gender;
        $form_experience = $request->experience;
        $date = Carbon::now();
       
        $jobsQuery = Job::with('rCompany', 'rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience')
                    ->orderBy('id', 'desc')
                    ->where(function ($query) use ($request, $date) {
                        if ($request->title) {
                            $query->where('title', 'LIKE', '%' . $request->title . '%');
                        }
                        if($request->location != null){
                            $query->where('job_location_id', $request->location );
                        }
                        if($request->category != null){
                            $query->where('job_category_id', $request->category );
                        }
                        if($request->type != null){
                            $query->where('job_type_id', $request->type );
                        }
                        if($request->experience != null){
                            $query->where('job_experience_id', $request->experience );
                        }
                        if($request->gender != null){
                            $query->where('job_gender_id', $request->gender );
                        }
                        if($request->salary != null){
                            $query->where('job_salary_id', $request->salary );
                        }
                        // Thêm các điều kiện tìm kiếm khác tại đây

                        // Lọc các công việc có deadline lớn hơn hoặc bằng ngày hiện tại
                        $query->whereDate('deadline', '>=', $date->toDateString());
                    });

                    $jobs = $jobsQuery->paginate(10);
        
        return view('front.job_list', compact('form_nature','form_experience','home_page_data','jobs', 'job_categories', 'job_locations',
         'form_title', 'form_category', 'form_location', 'job_types', 'job_genders', 
         'job_salaries', 'job_experiences', 'form_type', 'form_salary', 'form_gender', 'job_levels','job_natures',
         'form_experience'));
    }

    
    
    public function detail(Request $request,$id){
        $showModal = $request->input('showModal', false);

        $job = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience', 'rJobNature', 'rJobLevel')->where('id',$id)->first();
        $job_data = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience')->where('job_category_id',$job->job_category_id)->get();
        $job_company_data = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience')->where('company_id',$job->company_id)->get();
        $jobs = $job_data->where('id', '!=' , $job->id);
        $job_company = $job_company_data->where('id', '!=' , $job->id);
        $home_page_data = PageHomeItem::where('id',1)->first();
        $job_categories = JobCategory::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('id', 'asc')->get();
        $job_types = JobType::get();
        return view('front.job', compact('showModal','job_company','job', 'jobs', 'home_page_data', 'job_categories', 'job_locations', 'job_types'));
    }

    public function detail_job($id){

        $job = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience', 'rJobNature', 'rJobLevel')->find($id);
        $featured_jobs = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience', 'rJobNature', 'rJobLevel')->get();
        $job_data = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience')->where('job_category_id',$job->job_category_id)->get();
        $job_company_data = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience')->where('company_id',$job->company_id)->get();
        $jobs = $job_data->where('id', '!=' , $job->id);
        $job_company = $job_company_data->where('id', '!=' , $job->id);
        $job_categories = JobCategory::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('id', 'asc')->get();
        $job_types = JobType::get();
        $modalContent = view('front.layout.modal.detail_job', compact('job_company','featured_jobs','job', 'jobs',  'job_categories', 'job_locations', 'job_types'))->render();
        return response()->json(['modal' => $modalContent]);
      
    }
}
