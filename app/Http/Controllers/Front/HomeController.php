<?php

namespace App\Http\Controllers\Front;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobType;
use App\Models\WhyChooseItem;
use App\Models\Post;
use App\Models\Job;
use App\Models\Company;

class HomeController extends Controller
{
    public function index(){
        $home_page_data = PageHomeItem::where('id',1)->first();
        $job_categories = JobCategory::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('id', 'asc')->get();
        $job_types = JobType::get();
        $why_choose_items = WhyChooseItem::get();
        $posts = Post::orderBy('id','desc')->get();
        $companies = Company::get();
       
        $today = Carbon::now(); // Tạo một đối tượng Carbon với ngày hiện tại
        $job_category_data = JobCategory::withCount(['rJob' => function ($query) use ($today) {
            $query->whereDate('deadline', '>=', $today->toDateString());
        }])
        ->orderBy('r_job_count', 'desc')
        ->get();
        
        $featured_jobs = Job::with('rCompany','rJobGender', 'rJobCategory', 'rJobLocation', 'rJobType', 'rJobSalary', 'rJobExperience')->orderBy('id', 'desc')->whereDate('deadline', '>=', $today->toDateString())->paginate(10);
        return view('front.home', compact('companies','home_page_data','job_category_data', 'job_categories','why_choose_items','posts', 'job_locations', 'job_types', 'featured_jobs'));
    }

    // public function form_login(){

    //     return view('front.layout.form_login');
    // }
    public function form_login()
{
    // Tải nội dung modal từ tệp HTML loginModal.blade.php
    $modalContent = view('loginModal')->render();

    return response()->json(['modal' => $modalContent]);
}

}
