<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDiaryRequest;
use App\Http\Resources\Diary\DiaryCollection;
use App\Http\Resources\Diary\DiaryResource;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DiaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DiaryCollection::collection(Diary::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diary= new Diary;
        $image=$request->file('image');
        $currentDate=Carbon::now()->toDateString();
        $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('images/diary'))
        {
        Storage::disk('public')->makeDirectory('images/diary');
        }
        $diaryImage = Image::make($image)->resize(700,500)->stream();

        Storage::disk('public')->put('images/diary/'.$imageName,$diaryImage);
        $diary->title=$request->title;
        $diary->image=$imageName;
        $diary->details=$request->details;
        $diary->save();
        return response(['data'=>"Uploaded!"],201);
    }

    
    public function show( Diary $diary)
    {
        // return $diary;
        return new DiaryResource($diary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        $diary->update($request->all());
        return response(['data'=>new DiaryResource($diary)],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
         $diary->delete();
         return response()->json(["massage"=>"Product deleted"],203);
    }
}
