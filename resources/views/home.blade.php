@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <bus-component 
                :bus_types="{{ json_encode($bus_types) }}"
                :bus_layouts="{{ json_encode($bus_layouts) }}"
                >
            </bus-component>
        </div>
    </div>
</div>
@endsection
