@extends('layouts.app')

@section('content')
   <bus-list-component  :all_bus ="{{ json_encode($all_bus) }}"></bus-list-component>
@endsection
