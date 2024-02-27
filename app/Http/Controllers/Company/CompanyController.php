<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyPhoto;
use App\Models\CompanyIndustry;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobGender;
use App\Models\JobSalary;
use App\Models\JobExperience;
use App\Models\JobType;
use App\Models\JobLevel;
use App\Models\JobNature;
use App\Models\CandidateApplication;
use Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Validation\Rule;


class CompanyController extends Controller
{
    public function index(){
        $total_opened_jobs = Job::where('company_id', Auth::guard('company')->user()->id)->count();
        $total_featured_jobs = Job::where('company_id', Auth::guard('company')->user()->id)->where('is_featured', 1)->count();
        $job_data = Job::with('rJobCategory')->where('company_id', Auth::guard('company')->user()->id)->orderBy('id', 'desc')->get();
        return view('company.home', compact('job_data', 'total_opened_jobs', 'total_featured_jobs'));
    }

    public function photo(){
        $order_data = Order::where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();
        $package_data = Package::where('id', $order_data->package_id)->first();
        
        if(!$order_data){
            return redirect()->back()->with('error', 'You must have to buy a package first to access this page.');
        }
        if($package_data->total_allowed_photos == 0){
            return redirect()->back()->with('error', 'Your current package does not have any allow to access the photo section ');
        }

        $photos = CompanyPhoto::where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.photo', compact('photos'));
    }

    public function photo_submit(Request $request){

        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,gif',
           
        ]);
        $obj = new CompanyPhoto();
        $ext = $request->file('photo')->extension();
        $final_name = 'company_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->save();
        return redirect()->back()->with('success', 'Data is updated successfully');
    }
    
    public function photo_delete($id){
        $single_data = CompanyPhoto::where('id', $id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        CompanyPhoto::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully');

    }
    
    public function make_payment(){

        $current_plan = Order::with('rPackage')->orderBy('id', 'desc')->where('company_id',Auth::guard('company')->user()->id)->where('currently_active', 1)->first();
        $package = Package::get();
        
        // dd($current_plan);
        return view('company.make_payment', compact('current_plan', 'package'));

    }

    public function orders(){
        
        $orders = Order::with('rPackage')->where('company_id',Auth::guard('company')->user()->id)->get();
        
        return view('company.orders', compact('orders'));

    }

    public function edit_profile(){
        $company_locations = CompanyLocation::orderBy('name', 'asc')->get();
        $company_industries = CompanyIndustry::orderBy('name', 'asc')->get();
        $company_sizes = CompanySize::get();
        return view('company.edit_profile', compact('company_locations', 'company_industries', 'company_sizes'));
    }

    public function edit_profile_update(Request $request){

        $obj = Company::where('id', Auth::guard('company')->user()->id)->first();
        $id = $obj->id;
        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'company_name' => 'required',
            'email' => ['required', 'email', Rule::unique('companies')->ignore($id)],
        ]);

        if($request->hasFile('logo')){
            
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif',
               
            ]);
            if(Auth::guard('company')->user()->logo != ''){
                unlink(public_path('uploads/'.$obj->logo));
            }

            $ext = $request->file('logo')->extension();
            $final_name = 'company_logo_'.time().'.'.$ext;

            $request->file('logo')->move(public_path('uploads/'), $final_name);
            $obj->logo = $final_name;
           
        }

        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->email = $request->email;
        $obj->description = $request->description;
        $obj->phone = $request->phone;
        $obj->address = $request->address;
        $obj->company_industry_id = $request->company_industry_id;
        $obj->company_size_id = $request->company_size_id;
        $obj->company_location_id = $request->company_location_id;
        $obj->website = $request->website;
        $obj->founded_on = $request->founded_on;
        $obj->map_code = $request->map_code;
        $obj->facebook = $request->facebook;
        $obj->instagram = $request->instagram;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successfully');
   
    }

    public function paypal(Request $request)
    {
        $single_package_data = Package::where('id', $request->package_id)->first();
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $single_package_data->package_price
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    session()->put('package_id',$single_package_data->id);
                    session()->put('package_price',$single_package_data->package_price);
                    session()->put('package_days',$single_package_data->package_days);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            //save data into db

            $data['currently_active'] = 0;
            Order::where('company_id', Auth::guard()->user()->id)->update($data);

            $obj = new Order();
            $obj->company_id = Auth::guard()->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_no = time();
            $obj->paid_amount = session()->get('package_price');
            $obj->payment_method = 'PayPal';
            $obj->start_date = date('Y-m-d');
            $days = session()->get('package_days');
            $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
            $obj->currently_active = 1;
            $obj->save();

            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');
            return redirect()->route('company_make_payment')->with('success', 'Payment is successfully');
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is cancelled');

    }

    public function job_create(){

        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'desc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_salaries = JobSalary::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_natures = JobNature::orderBy('id', 'asc')->get();
        $job_levels = JobLevel::orderBy('id', 'asc')->get();

        return view('company.job_create', compact('job_natures','job_levels','job_categories','job_types', 'job_genders', 'job_experiences', 'job_salaries' , 'job_locations'));

    }

    public function job_list(){

        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'desc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_salaries = JobSalary::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_natures = JobNature::orderBy('id', 'asc')->get();
        $job_levels = JobLevel::orderBy('id', 'asc')->get();
        return view('company.jobs', compact('job_natures','job_levels','job_categories','job_types', 'job_genders', 'job_experiences', 'job_salaries' , 'job_locations'));

    }

    public function job_create_submit(Request $request){
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);

        $obj = new Job();
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        // $obj->deadline = $request->deadline;
        $obj->deadline = \Carbon\Carbon::createFromFormat('d-m-Y', $request->deadline)->format('Y-m-d');

        $obj->vacancy = $request->vacancy;
        $obj->attachments = $request->attachments;
        $obj->skill = $request->skill;
        $obj->benefit = $request->benefit;
        $obj->job_location_id = $request->job_location_id;
        $obj->job_type_id = $request->job_type_id;
        $obj->job_salary_id = $request->job_salary_id;
        $obj->job_gender_id = $request->job_gender_id;
        $obj->job_experience_id = $request->job_experience_id;
        $obj->job_category_id = $request->job_category_id;
        $obj->job_nature_id = $request->job_nature_id;
        $obj->job_level_id = $request->job_level_id;

        $obj->save();
        return redirect()->back()->with('success', 'Job is posted successfully');

    }

    public function jobs(){
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'desc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_salaries = JobSalary::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_natures = JobNature::orderBy('id', 'desc')->get();
        $job_levels = JobLevel::orderBy('id', 'desc')->get();
        $jobs = Job::with('rJobCategory')->where('company_id', Auth::guard('company')->user()->id)->get();
        
        $candidates = CandidateApplication::with('rCandidate', 'rJob')->get();

        return view('company.jobs', compact('candidates','job_natures','job_levels','jobs','job_categories','job_types', 'job_genders', 'job_experiences', 'job_salaries' , 'job_locations'));

    }

    public function job_edit($id){
        $job_data = Job::where('id', $id)->first();
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'desc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_salaries = JobSalary::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        return view('company.job_edit', compact('job_data','job_categories','job_types', 'job_genders', 'job_experiences', 'job_salaries' , 'job_locations'));

    }
    
    public function job_edit_update(Request $request, $id){

        $obj = Job::where('id', $id)->first();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);
        $obj->title = $request->title;
        $obj->description = $request->description;
        // $obj->deadline = $request->deadline;
        $obj->deadline = \Carbon\Carbon::createFromFormat('d-m-Y', $request->deadline)->format('Y-m-d');
        $obj->vacancy = $request->vacancy;
        $obj->skill = $request->skill;
        $obj->benefit = $request->benefit;
        $obj->job_location_id = $request->job_location_id;
        $obj->job_type_id = $request->job_type_id;
        $obj->job_salary_id = $request->job_salary_id;
        $obj->job_gender_id = $request->job_gender_id;
        $obj->job_experience_id = $request->job_experience_id;
        $obj->job_category_id = $request->job_category_id;
        $obj->job_level_id = $request->job_level_id;
        $obj->job_nature_id = $request->job_nature_id;
        $obj->update();
        return redirect()->back()->with('success', 'Job is posted successfully');

    }
    public function update_status($id){
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
    public function changeJobStatus($id, Request $request)
    {
        $job = CandidateApplication::find($id);

        if ($job && in_array($request->status, [0, 1])) {
            $job->status = $request->status;
            $job->save();
            return response()->json(['message' => 'Thay đổi trạng thái thành công']);
        }

        return response()->json(['message' => 'Thay đổi trạng thái không hợp lệ'], 400);
    }
    public function job_delete($id){

        Job::where('id', $id)->delete();
        return redirect()->route('company_job')->with('success', 'Job is deleted successfully');


    }

    public function view_cv($id){
        $data = CandidateApplication::with('rCandidate')->find($id);
        if($data->is_seen ==0){
            $data->is_seen = 1;
            $data->update();
        }
        
        return view('company.view_cv', compact('data'));
    }

    public function candidate_list($id){
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        $job_types = JobType::orderBy('name', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'desc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_salaries = JobSalary::orderBy('id', 'asc')->get();
        $job_locations = JobLocation::orderBy('name', 'asc')->get();
        $job_natures = JobNature::orderBy('id', 'desc')->get();
        $job_levels = JobLevel::orderBy('id', 'desc')->get();
        $jobs = Job::with('rJobCategory')->where('company_id', Auth::guard('company')->user()->id)->get();
        
        $candidates = CandidateApplication::with('rCandidate', 'rJob')->where('job_id', $id)->get();
        $single_job = Job::where('id', $id)->first();
        return view('company.candidate_list', compact('single_job','candidates','job_natures','job_levels','jobs','job_categories','job_types', 'job_genders', 'job_experiences', 'job_salaries' , 'job_locations'));


    }
}
