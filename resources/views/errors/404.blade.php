@extends('layouts.app')

@section('title') Page Not Found - Error 404 @endsection

@section('content')
<div class="container-fluid text-center">
	<h2>404 Page Not Found!</h2>
	<a href="{{ route('home') }}" title="Go To Home Page of Music Links" data-toggle="tooltip" data-placement="bottom">Home Page</a>

</div>
@include('includes.footer')
@endsection