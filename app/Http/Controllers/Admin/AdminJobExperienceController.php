<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobExperience;
use App\Models\JobLevel;
use App\Models\JobNature;


class AdminJobExperienceController extends Controller
{
    public function index(){
        $job_experiences = JobExperience::get();
        return view('admin.job_experience',compact('job_experiences'));
    }

    public function create(){
        return view('admin.job_experience_create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobExperience();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_experience')->with('success', 'Data is saved successfully');
    }

    public function edit($id){
        $job_experience_item = JobExperience::where('id', $id)->first();
        return view('admin.job_experience_edit', compact('job_experience_item'));
    }

    public function update(Request $request, $id){
        $obj = JobExperience::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_experience')->with('success', 'Data is updated successfully');
   
    }

    public function delete($id){
        JobExperience::where('id', $id)->delete();
        return redirect()->route('admin_job_experience')->with('success', 'Data is deleted successfully');

    }

    /* Job Nature */
    public function nature(){
        $job_natures = JobNature::get();
        return view('admin.job_nature',compact('job_natures'));
    }

    public function nature_create(){
        return view('admin.job_nature_create');
    }

    public function nature_store(Request $request){
        
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobNature();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_nature')->with('success', 'Data is saved successfully');
    }

    public function nature_edit($id){
        $job_nature_item = JobNature::where('id', $id)->first();
        return view('admin.job_nature_edit', compact('job_nature_item'));
    }

    public function nature_update(Request $request, $id){
        $obj = JobNature::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_nature')->with('success', 'Data is updated successfully');
   
    }

    public function nature_delete($id){
        JobNature::where('id', $id)->delete();
        return redirect()->route('admin_job_nature')->with('success', 'Data is deleted successfully');

    }
    /* end Job Nature */

      /* Job Level */

      public function level(){
        $job_levels = JobLevel::get();
        return view('admin.job_level',compact('job_levels'));
    }

    public function level_create(){
        return view('admin.job_level_create');
    }

    public function level_store(Request $request){
        
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobLevel();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_level')->with('success', 'Data is saved successfully');
    }

    public function level_edit($id){
        $job_level_item = JobLevel::where('id', $id)->first();
        return view('admin.job_level_edit', compact('job_level_item'));
    }

    public function level_update(Request $request, $id){
        $obj = JobLevel::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_level')->with('success', 'Data is updated successfully');
   
    }

    public function level_delete($id){
        JobLevel::where('id', $id)->delete();
        return redirect()->route('admin_job_level')->with('success', 'Data is deleted successfully');

    }
    /* end Job Level */
}
