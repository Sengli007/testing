@extends('layouts.app')

@section('content')
   <bus-seat-show-component 
   :bus_seat_entry = "{{ json_encode($bus) }}"
   :bus_layout = "{{ json_encode($bus_layout) }}"
   :bus_seat = "{{ json_encode($bus_seat) }}"
   >
</bus-seat-show-component>
@endsection
