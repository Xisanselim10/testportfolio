<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

class GalleryController extends Controller
{
	private $table = 'galeries';

    //List Gallery
    public function index()
    {
    	$galleries = DB::table($this->table)->get();
    	return view('gallery/index', compact('galleries'));
    }

    // Show Create Form
    public function create()
    {
    	if (!Auth::check())
    	{
    		return \Redirect::route('gallery.index');
    	}
    	return view('gallery/create');
    }

    // Store Gallery
    public function store(Request $request)
    {
    	$name = $request->input('name');
    	$description = $request->input('description');
    	$cover_image = $request->file('cover_image');
    	$owner_id = 1;

    	// Check Image Upload
    	if ($cover_image)
    	{
    		$cover_image_filename = $cover_image->getClientOriginalName();
    		$cover_image->move(public_path('images'), $cover_image_filename);
    	}
    	else
    	{
    		$cover_image_filename = "no_image.jpg";
    	}

    	// Insert to DB
    	DB::table($this->table)->insert(
    		[
    			'name' => $name,
    			'description' => $description,
    			'cover_image' => $cover_image_filename,
    			'owner_id' => $owner_id
    		]
    	);

    	// Set Message For Complete Insert Action
    	\Session::flash('message','Gallery Created Successfully');

    	// Redirect to Index Page
    	return \Redirect::route('gallery.index');
    	
    }

    // Show Gallery Photo
    public function show($id)
    {
    	$gallery = DB::table($this->table)->where('id', $id)->first();

    	$photos = DB::table('photos')->where('gallery_id', $id)->get();

    	return view('gallery/show', compact('gallery','photos'));
    }
}
