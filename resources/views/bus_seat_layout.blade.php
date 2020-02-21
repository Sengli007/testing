@extends('layouts.app')

@section('content')
   <bus-seat-layout-component 
   :bus_seat_entry = "{{ json_encode($bus) }}"
   :bus_layout = "{{ json_encode($bus_layout) }}"

   >
</bus-seat-layout-component>
@endsection
