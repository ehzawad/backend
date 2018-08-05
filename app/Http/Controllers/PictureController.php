<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Picture;
use App\Http\Resources\Picture as PictureResource;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::paginate(15);

        return PictureResource::collection($pictures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $picture = $request->isMethod('put') ? Picture::findOrFail($request->picture_id) : new Picture;
        $picture->id = $request->input('picture_id');
        $picture->picture = $request->input('picture');
        $picture->description = $request->input('description');

        if ($picture->save()) {
            return new PictureResource($picture);
        }


       $this->validate($request, [
              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path('/images');
           $imagePath = $destinationPath. "/".  $name;
           $image->move($destinationPath, $name);
           $picture->image = $name;
         }

       $article->picture = $request->get('description');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $picture = Picture::findOrFail($id);
        return new PictureResource($picture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $picture = Picture::findOrFail($id);
        if ($picture->delete()) {
            return new PictureResource($picture);
        }
    }
}
