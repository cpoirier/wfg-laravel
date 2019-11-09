<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listings = DB::table('listings')->paginate(16);
      
      return view('listings', ['listings' => $listings]);
    }
    
    public function pull()
    {
      $listings = DB::table('listings')->paginate(16);
      
      return view('home', ['listings' => $listings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('listing.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author_name'=>'required',
            'blurb'=>'required',
            'status'=>'required',
            'story_home_url'=>'required',
        ]);

        $listing = new Listing([
            'title' => $request->get('title'),
            'author_name' => $request->get('author_name'),
            'slug' => $request->get('slug'),
            'tagline' => $request->get('tagline'),
            'blurb' => $request->get('blurb'),
            'status' => $request->get('status'),
            'graphic_sex' => $request->get('graphic_sex'),
            'graphic_violence' => $request->get('graphic_violence'),
            'harsh_language' => $request->get('harsh_language'),
            'story_home_url' => $request->get('story_home_url'),
            'first_page_url' => $request->get('first_page_url'),
            'cover_image_url' => $request->get('cover_image_url'),
            'header_image_url' => $request->get('header_image_url'),
            'banner_image_url' => $request->get('banner_image_url'),
        ]);
        $listing->save();
        return redirect('/listings')->with('success', 'Listing saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $listing = Listing::find($id);
      return view('listing.edit', compact('listing'));  
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
      $request->validate([
            'title'=>'required',
            'author_name'=>'required',
            'blurb'=>'required',
            'status'=>'required',
            'story_home_url'=>'required',
        ]);

        $listing = Listing::find($id);
        $listing->title = $request->get('title');
        $listing->author_name = $request->get('author_name');
        $listing->slug = $request->get('slug');
        $listing->tagline = $request->get('tagline');
        $listing->blurb = $request->get('blurb');
        $listing->status = $request->get('status');
        $listing->graphic_sex = $request->get('graphic_sex');
        $listing->graphic_violence = $request->get('graphic_violence');
        $listing->harsh_language = $request->get('harsh_language');
        $listing->story_home_url = $request->get('story_home_url');
        $listing->first_page_url = $request->get('first_page_url');
        $listing->cover_image_url = $request->get('cover_image_url');
        $listing->header_image_url = $request->get('header_image_url');
        $listing->banner_image_url = $request->get('banner_image_url');

        $listing->save();
        return redirect('/listings')->with('success', 'Listing saved!');
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
    }
}
