<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class AdminJobCategoryController extends Controller
{
    public function index(){
        $job_categories = JobCategory::orderBy('created_at', 'desc')->get();
        return view('admin.job_category',compact('job_categories'));
    }

    public function create(){
        return view('admin.job_category_create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobCategory();
        if($request->icon != ''){
            $ext = $request->file('icon')->extension();
            $final_name = 'category_'.time().'.'.$ext;
            $request->file('icon')->move(public_path('uploads/'),$final_name);
            $obj->icon = $final_name;
        }
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_job_category')->with('success', 'Data is saved successfully');
    }

    public function edit($id){
        $job_category_item = JobCategory::where('id', $id)->first();
        return view('admin.job_category_edit', compact('job_category_item'));
    }

    public function update(Request $request, $id){
        $obj = JobCategory::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);
        if($request->icon != ''){
            if($request->hasFile('icon')){
                $request->validate([
                    'icon' => 'image|mimes:jpg,jpeg,png,gif',
                ]);
                if(file_exists('uploads/'.$obj->icon)){
                    @unlink('uploads/'.$obj->icon);
                }
    
                $ext = $request->file('icon')->extension();
                $final_name = 'category_'.time().'.'.$ext;
    
                $request->file('icon')->move(public_path('uploads/'), $final_name);
                $obj->icon = $final_name;
               
            }
        }
        
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_category')->with('success', 'Data is updated successfully');
   
    }

    public function delete($id){
        JobCategory::where('id', $id)->delete();
        return redirect()->route('admin_job_category')->with('success', 'Data is deleted successfully');

    }
}

