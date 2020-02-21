@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <bus-type-component></bus-type-component>
        </div>
        <div class="col-lg-6">
            <bus-layout-component></bus-layout-component>
        </div>
    </div>
</div>
@endsection
