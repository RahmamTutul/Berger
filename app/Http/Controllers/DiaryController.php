<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DiaryController extends Controller
{
    public function index(){
       $diaries=Diary::all()->toArray();
    //    dd($diaries);
       return view('backend.pages.diary.index')->with(compact('diaries'));
    }
   public function add(Request $request){
       if($request->isMethod('post')){
           $data=$request->all();
        //    dd($data);
            $request->validate([
               'title'=>'required',
               'details'=>'required',
               'image'=>'required|image|mimes:jpeg,png|max:2024' //Max 2 mb
            ]);
            if($request->hasFile('image'))
            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/diary'))
             {
                Storage::disk('public')->makeDirectory('images/diary');
             }

             $diaryImage = Image::make($image)->resize(700,500)->stream();
             Storage::disk('public')->put('images/diary/'.$imageName,$diaryImage);
            }else{
                $imageName= 'default.png';
            }
           $diary=New Diary;
           $diary->title=$data['title'];
           $diary->details=$data['details'];
           $diary->image=$imageName;
           $diary->save();
           Toastr::success('Success!','New diary added!');
           return redirect('diary/index');die;
       }
       return view('backend.pages.diary.add');
   }
   public function edit(Request $request, $id){
       $diary=Diary::find($id);
       if($request->isMethod('post')){
           $data=$request->all();
        //    dd($data);
            $request->validate([
               'title'=>'required',
               'details'=>'required',
               'image'=>'image|mimes:jpeg,png|max:2024' //Max 2 mb
            ]);
            if($request->hasFile('image'))
            {
             $image=$request->file('image');
             $currentDate=Carbon::now()->toDateString();
             $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

             if(!Storage::disk('public')->exists('images/diary'))
             {
                Storage::disk('public')->makeDirectory('images/diary');
             }
            if(Storage::disk('public')->exists('images/diary/'.$diary->image))
            {
            Storage::disk('public')->delete('images/diary/'.$diary->image);
            }
             $diaryImage = Image::make($image)->resize(700,500)->stream();
             Storage::disk('public')->put('images/diary/'.$imageName,$diaryImage);
            }else{
                $imageName= $diary['image'];
            }
           $diary->title=$data['title'];
           $diary->details=$data['details'];
           $diary->image=$imageName;
           $diary->save();
           Toastr::success('Success!','Diary updated!');
           return redirect('diary/index');die;
       }
       return view('backend.pages.diary.edit')->with(compact('diary'));
   }
   public function delete($id){
        $data=Diary::find($id);
        if(Storage::disk('public')->exists('images/diary/'.$data->image))
        {
            Storage::disk('public')->delete('images/diary/'.$data->image);
        }
      $data->delete();
      Toastr::success('Success!','diary Deleted!');
      return redirect('diary/index');die;
   }
}
