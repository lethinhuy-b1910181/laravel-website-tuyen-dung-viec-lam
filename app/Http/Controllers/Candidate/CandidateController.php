<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CandidateBookmark;
use App\Models\Job;
use App\Models\CandidateApplication;
use Auth;
use Hash;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{
    public function index(){
        return view('candidate.home');
    }

    public function edit_profile(){
        
        return view('candidate.edit_profile');
    }

    public function edit_profile_update(Request $request){

        $obj = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        $id = $obj->id;
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email', Rule::unique('candidates')->ignore($id)],
        ]);
            if($request->hasFile('photo')){
                
                $request->validate([
                    'photo' => 'image|mimes:jpg,jpeg,png,gif',
                
                ]);
                if(Auth::guard('candidate')->user()->photo != ''){
                    unlink(public_path('uploads/candidate_photo_'.$obj->photo));
                }

                $ext = $request->file('photo')->extension();
                $final_name = 'candidate_photo_'.time().'.'.$ext;

                $request->file('photo')->move(public_path('uploads/'), $final_name);
                $obj->photo = $final_name;
            
            }
         
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->gender = $request->gender;
        $obj->address = $request->address;
        $obj->website = $request->website;
        $obj->cover_letter = '';
        $obj->cv_url = '';
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successfully');
   
    }

    public function update_cv(Request $request){
        $obj = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        $obj->cover_letter = $request->cover_letter;
    
        if ($request->hasFile('cv_url') && $request->file('cv_url')->isValid()) {
            $file = $request->file('cv_url'); // Khai báo biến $file ở đây
    
            if ($obj->cv_url && file_exists(public_path('uploads/'.$obj->cv_url))) {
                unlink(public_path('uploads/'.$obj->cv_url));
            }
    
            $ext = $file->extension();
            $final_name = $file->getClientOriginalName();
    
            $file->move(public_path('uploads/'), $final_name);
            $obj->cv_url = $final_name; // Sử dụng tên gốc của file
    
        }
    
        $obj->update();
        return redirect()->back()->with('success', 'Data is updated successfully');
    }
    
    
    public function bookmark_add($id){
        

        $existing_bookmark_check = CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $id)->count();
        if($existing_bookmark_check > 0){
            CandidateBookmark::where('job_id', $id)->delete();
            $message = 'Bỏ lưu tin thành công';

        }else{
            $obj = new CandidateBookmark();
            $obj->candidate_id = Auth::guard('candidate')->user()->id;
            $obj->job_id = $id;
            $obj->save();
            $message = 'Lưu tin thành công';

        }
        return response()->json(['message' => $message]);
        
    }

    public function my_job(){
        $jobs = CandidateBookmark::with('rJob')->where('candidate_id', Auth::guard('candidate')->user()->id)->orderBy('id', 'desc')->get();
        $job_apply = CandidateApplication::with('rJob', 'rCandidate')->where('candidate_id', Auth::guard('candidate')->user()->id)->orderBy('id','desc')->get();
        return view('candidate.my_job', compact('jobs', 'job_apply'));
    }


    public function bookmark_delete($id){
        CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->where('id', $id)->delete();
         return response()->json(['message' => 'Xóa công việc thành công']);
    }

    public function apply_job(Request $request , $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'file' => 'required|file|mimes:doc,docx,pdf|max:5120',
           
        ]);
        $ext = $request->file('file')->extension();
        $final_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('uploads/'), $final_name);
        $obj = new CandidateApplication();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->letter = $request->letter;
        $obj->file = $final_name;
        $obj->status = -1;
        $obj->save();

        $job = Job::where('id', $id)->first();
        $job->quantity = $job->quantity + 1;
        $job->update();
        return redirect()->back();

    }

    // public function apply_job(Request $request , $id){
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'file' => 'required|file|mimes:doc,docx,pdf|max:5120', // Kiểm tra file với các định dạng và kích thước tối đa là 5MB
    //     ]);
    
    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $ext = $file->getClientOriginalExtension();
    //         $final_name = $file->getClientOriginalName();
    //         $file->move(public_path('uploads/'), $final_name);
    
    //         $obj = new CandidateApplication();
    //         $obj->candidate_id = Auth::guard('candidate')->user()->id;
    //         $obj->job_id = $id;
    //         $obj->name = $request->name;
    //         $obj->email = $request->email;
    //         $obj->phone = $request->phone;
    //         $obj->letter = $request->letter;
    //         $obj->file = $final_name;
    //         $obj->status = 0;
    //         $obj->save();
    
    //         return redirect()->back();
    //     } else {
    //         // Xử lý khi không có file được tải lên
    //         return redirect()->back()->with('error', 'Vui lòng chọn một file để tải lên.');
    //     }
    // }
    

    public function change_password(){
          return view('candidate.change_password');
    }

    public function change_password_submit(Request $request){
        $data = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
       //Validation
       $request->validate([
        'oldPassword' => 'required',
        'newPassword' => 'required',
        'retypePassword' => 'required|same:newPassword'
            ]);

        if(!Hash::check($request->oldPassword,Auth::guard('candidate')->user()->password )){

            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        //update the new password
        

        $data->password = Hash::make($request->newPassword);
        $data->update();    

        $notification = array(
            'message' => ' Password Change Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
        
  }

}
