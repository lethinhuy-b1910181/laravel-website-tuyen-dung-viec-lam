<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseItem;

class AdminWhyChooseController extends Controller
{
    public function index(){
        $why_choose_items = WhyChooseItem::get();
        return view('admin.why_choose_item', compact('why_choose_items'));
    }
    public function create(){
        return view('admin.why_choose_item_create');
    }

    public function store(Request $request){
        
        $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'icon' => 'required',

        ]);

        $obj = new WhyChooseItem();
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->icon = $request->icon;
        $obj->save();

        return redirect()->route('admin_why_choose_item')->with('success', 'Data is saved successfully');
    }

    public function edit($id){
        $why_choose_item = WhyChooseItem::where('id', $id)->first();
        return view('admin.why_choose_item_edit', compact('why_choose_item'));
    }

    public function update(Request $request, $id){
        $obj = WhyChooseItem::where('id', $id)->first();

        $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'icon' => 'required',

        ]);
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->icon = $request->icon;
        $obj->update();

        return redirect()->route('admin_why_choose_item')->with('success', 'Data is updated successfully');
   
    }

    public function delete($id){
        WhyChooseItem::where('id', $id)->delete();
        return redirect()->route('admin_why_choose_item')->with('success', 'Data is deleted successfully');

    }
}
