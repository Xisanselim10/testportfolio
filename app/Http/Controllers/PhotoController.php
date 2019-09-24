<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

class PhotoController extends Controller
{
    private $table = 'photos';
    
    //Show Create Form
    public function create($id)
    {
        if (!Auth::check())
        {
            return \Redirect::route('gallery.index');
        }
        return view('photo/create', compact('id'));
    }

    // Store Photo
    public function store(Request $request)
    {
    	$gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        if ($image)
        {
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
        }
        else
        {
            $image_filename = 'no_image.jpg';
        }

        DB::table($this->table)->insert(
            [
                'gallery_id' => $gallery_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image' => $image_filename,
                'owner_id' => $owner_id
            ]
        );

        \Session::flash('message','Portfolio Created Succesfully');

        return \Redirect::route('gallery.show', array('id' => $gallery_id));        
    }

    public function edit($id)
    {
        if (!Auth::check())
        {
            return \Redirect::route('gallery.index');
        }
        $photo = DB::table($this->table)->where('id', $id)->first();

        return view('photo/edit', compact('photo'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $previous_image = $request->input('previous_image');
        $image = $request->file('image');
        $owner_id = 1;

        if ($image)
        {
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
        }
        else
        {
            $image_filename = $previous_image;
        }

        DB::table($this->table)->where('id', $id)->update(
            [
                'gallery_id' => $gallery_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image' => $image_filename,
                'owner_id' => $owner_id
            ]
        );

        \Session::flash('message','Portfolio Updated Succesfully');

        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }

    // Show Gallery Photo
    public function details($id)
    {
        $photo = DB::table($this->table)->where('id', $id)->first();

        return view('photo/details', compact('photo'));
    }

    public function destroy($photo_id, $gallery_id)
    {
        $photo_delete = DB::table($this->table)->where('id', $photo_id)->delete();

        \Session::flash('message','Portfolio Deleted Succesfully');

        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }
}
