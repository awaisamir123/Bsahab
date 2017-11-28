<?php

namespace App\Http\Controllers;

use App\pickAndDrop;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class PickAndDropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ($request->name == null) {
          return Helper::response('please enter name',0);
        }
        if ($request->phoneNo == null) {
          return Helper::response('please enter phone Number',0);
        }
        if ($request->institute == null) {
          return Helper::response('please enter institute name',0);
        }
        if ($request->vehicle_type == null) {
          return Helper::response('please choice vehcile type',0);
        }
        if ($request->description == null) {
          return Helper::response('please enter description',0);
        }
        $pickAndDrop = new pickAndDrop;
        $pickAndDrop->name = $request->name;
        $pickAndDrop->phone = $request->phoneNo;
        $pickAndDrop->institute = $request->institute;
        $pickAndDrop->vehicleType = $request->vehicle_type;
        $pickAndDrop->description = $request->description;
        $pickAndDrop->createdAt  = date('Y-m-d H:i:s');
        $pickAndDrop->save();
        $message = <<<MSG
        Pick and drop details: <br>
        Name: $request->name<br>
        PhoneNo: $request->phoneNo<br>
        institute: $request->institute<br>
        vehicle Type: $request->description
MSG;

        Helper::mail('Pick and drop from bsahab',$message);
        helper::sendNotification();
        return Helper::response('Your request has been recived.We will contact you back shortly.Thank You',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pickAndDrop  $pickAndDrop
     * @return \Illuminate\Http\Response
     */
    public function show(pickAndDrop $pickAndDrop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pickAndDrop  $pickAndDrop
     * @return \Illuminate\Http\Response
     */
    public function edit(pickAndDrop $pickAndDrop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pickAndDrop  $pickAndDrop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pickAndDrop $pickAndDrop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pickAndDrop  $pickAndDrop
     * @return \Illuminate\Http\Response
     */
    public function destroy(pickAndDrop $pickAndDrop)
    {
        //
    }
}
