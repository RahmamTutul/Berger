<?php

namespace App\Http\Controllers;

use App\Models\Paint;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PaintController extends Controller
{
     public function index(){
       $paints=Paint::all()->toArray();
    //    dd($diaries);
       return view('backend.pages.paint.index')->with(compact('paints'));
    }
   public function add(Request $request){
       if($request->isMethod('post')){
           $data=$request->all();
        //    dd($data);
            $request->validate([
               'title'=>'required',
               'image'=>'required|image|mimes:jpeg,png|max:2024' //Max 2 mb
            ]);
            if($request->hasFile('image'))
            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/paint'))
             {
                Storage::disk('public')->makeDirectory('images/paint');
             }

             $paintImage = Image::make($image)->resize(700,500)->stream();
             Storage::disk('public')->put('images/paint/'.$imageName,$paintImage);
            }else{
                $imageName= 'default.png';
            }
           $paint=New paint;
           $paint->title=$data['title'];
           $paint->image=$imageName;
           $paint->save();
           Toastr::success('Success!','New paint added!');
           return redirect('paint/index');die;
       }
       return view('backend.pages.paint.add');
   }
   public function edit(Request $request, $id){
       $paint=Paint::find($id);
       if($request->isMethod('post')){
           $data=$request->all();
            $request->validate([
               'title'=>'required',
               'image'=>'required|image|mimes:jpeg,png|max:2024' //Max 2 mb
            ]);
            if($request->hasFile('image'))
            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/paint'))
             {
                Storage::disk('public')->makeDirectory('images/paint');
             }
            if(Storage::disk('public')->exists('images/paint/'.$paint->image))
            {
            Storage::disk('public')->delete('images/paint/'.$paint->image);
            }
             $paintImage = Image::make($image)->resize(100,800)->stream();
             Storage::disk('public')->put('images/paint/'.$imageName,$paintImage);
            }else{
                $imageName= $paint['image'];
            }
           $paint->title=$data['title'];
           $paint->image=$imageName;
           $paint->save();
           Toastr::success('Success!','Paint updated!');
           return redirect('paint/index');die;
       }
       return view('backend.pages.paint.edit')->with(compact('paint'));
   }
   public function delete($id){
        $data=Paint::find($id);
        if(Storage::disk('public')->exists('images/paint/'.$data->image))
        {
            Storage::disk('public')->delete('images/paint/'.$data->image);
        }
      $data->delete();
      Toastr::success('Success!','Paint Deleted!');
      return redirect('paint/index');die;
   }
}
