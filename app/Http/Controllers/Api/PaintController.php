<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\storePaintRequest;
use App\Http\Resources\Paint\PaintCollection;
use App\Http\Resources\Paint\PaintResource;
use App\Models\Paint;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PaintController extends Controller
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
        return PaintCollection::collection(Paint::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePaintRequest $request)
    {
        $diary= new Paint;
        $image=$request->file('image');
        $currentDate=Carbon::now()->toDateString();
        $imageName=$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('images/paint'))
        {
        Storage::disk('public')->makeDirectory('images/paint');
        }
        $paintImage = Image::make($image)->resize(1400,800)->stream();

        Storage::disk('public')->put('images/paint/'.$imageName,$paintImage);
        $diary->title=$request->title;
        $diary->image=$imageName;
        $diary->save();
        return response(['data'=>"Uploaded!"],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paint $paint)
    {
        return new PaintResource($paint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePaintRequest $request, Paint $paint)
    {
        $paint->update($request->all());
        return response(['massage'=>'updated!','data'=>new PaintResource($paint)],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paint $paint)
    {
        $paint->delete();
        return response(['massage'=>'Deleted!'],203);
    }
}
