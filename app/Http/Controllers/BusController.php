<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\BusType;
use App\BusLayout;
use App\BusSeat;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus_types = BusType::all();
        $bus_layouts = BusLayout::all();
        return view('home', compact('bus_types','bus_layouts'));
    
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
        //return $request->all();
        $bus_seat= $request['bus_seat_ary'];
        $bus_no = $bus_seat['b_no'];
        $bus_type_id = $bus_seat['b_type'];
        $tt_seat_row = $bus_seat['b_row'];
        $bus_layout_id = $bus_seat['b_layout_id'];
        $last_seat =$bus_seat['b_last_seat'];

        $bus=new Bus();
        $bus->bus_no= $bus_no;
        $bus->bus_type_id= $bus_type_id;
        $bus->tt_seat_row= $tt_seat_row;
        $bus->bus_layout_id= $bus_layout_id;
        $bus->last_seat= $last_seat;
      
        $bus->save();
        
       $bus_id= $bus->id;
        return response()->json($bus_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAllBus(){
        $all_bus= Bus::all();
        $all_layout= BusLayout::all();
        
        return view('buslist', compact('all_bus','all_layout'));
    }

    public function show($id)
    {
        $bus_seat= BusSeat::where('id',$id)->first();
        return view('bus_seat_layout', compact('bus_seat'));
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
    }

    
}
