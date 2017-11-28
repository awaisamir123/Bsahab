<?php

namespace App\Http\Controllers;

use App\destination;
use Illuminate\Http\Request;
use App\destinationGallery as destinationGallery;

class DestinationController extends Controller
{
    public function provinces(){
      $destinations = destination::all();
      $filterdDestations = destination::where('parent','=',0)->get();
      return view('destination.provinces',compact('destinations','filterdDestations'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $destinations = destination::where('province','=',$id)->get();
        return view('destination.index',compact('destinations'));
    }
    public function destination($id,$title = null)
    {
        if ($title != null) {
          $destination = destination::where('destination_id','=',$id)->first();
          $destination->videoThumbnail = null;
          $destinationGallery = destinationGallery::where('destinationId','=',$id)->get();
          if ($destination->videoLink != null) {
            $url = $destination->videoLink;
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            $destination->videoThumbnail = "https://img.youtube.com/vi/".$my_array_of_vars['v']."/0.jpg";
          }

          return view('destination.show',compact('destination','destinationGallery'));
        }
        $destinations = destination::where('province','=',$id)->get();
        return view('destination.index',compact('destinations'));
    }
    public function provinceNew($id,$title = null){
      $destinations = destination::where('province','=',$id)->get();

      return view('destination.index',compact('destinations'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $destination = destination::where('destination_id','=',$id)->first();
      // dd($destination);
      return view('destination.show',compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(destination $destination)
    {
        //
    }
}
