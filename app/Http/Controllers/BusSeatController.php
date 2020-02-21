<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusSeat;
use App\Bus;
use App\BusLayout;


class BusSeatController extends Controller
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
        $bus_seat_ary= $request['bus_seat_ary'];
        $bus_id= $request['busId'];
         
        $length=count($bus_seat_ary)-1;

        $last_row = $bus_seat_ary[$length];

        $last_child = count($last_row)-1;
        $row = $last_row[$last_child]['row']+1;
        $col = $last_row[$last_child]['col']+1;

        for($i=0;$i<$row;$i++) {
            for($j=0;$j<$col;$j++) {
                $bus_row= $bus_seat_ary[$i][$j]['row'];
                $bus_col= $bus_seat_ary[$i][$j]['col'];
                $bus_seat= $bus_seat_ary[$i][$j]['seat'];

                $seat_no = '';
                if($bus_seat == null || $bus_seat == ''){
                    $seat_no = '-';
                }else{
                    $seat_no = $bus_seat;
                }

                BusSeat::create([
                    'row' => $bus_row,
                    'col' => $bus_col,
                    'seat_no' => $seat_no,
                    'bus_id' => $bus_id
                ]);

            }
        }   
        return response()->json($bus_id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus= Bus::where('id',$id)->first();
        $bus_layout_id= $bus->bus_layout_id;

        $bus_layout= BusLayout::where('id',$bus_layout_id)->first();
        return view('bus_seat_layout', compact('bus','bus_layout'));
    }


    public function seatShow($id) {
        $bus= Bus::where('id',$id)->first();
        $bus_layout_id= $bus->bus_layout_id;

        $bus_layout= BusLayout::where('id',$bus_layout_id)->first();

        $bus_seat= BusSeat::where('bus_id',$id)->get();
        return view('bus_seat_show', compact('bus','bus_layout','bus_seat'));
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
