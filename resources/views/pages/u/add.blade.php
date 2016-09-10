@extends('layouts.app')

@section('title') Music Links - Add @endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		@include('includes.showerrors')
		@include('includes.showerror')
		@include('includes.showsuccess')
		<div class="col-md-6 col-md-offset-3">
			<a href="{{ route('dashboard') }}" class="btn btn-xs btn-primary">Back to Dashboard</a>
			<h3>Music Links</h3>
			<p>Add Music to record. Fill all fields as much as possible. Required fields: <strong>Music Title, Music Artist, Link URL, Genre</strong></p>

			<form role="form" action="{{ route('add_music') }}" method="POST" autocomplete="off">
				<div class="form-group">
					<input type="text" name="title" id="title" class="form-control" placeholder="Music Title" value="{{ old('title') }}" title="Enter Music Title" data-toggle="tooltip" data-placement="bottom" />
				</div>
				<div class="form-group">
					<input type="text" name="artist" id="artist" class="form-control" placeholder="Music Artist" value="{{ old('artist') }}" title="Enter Artist" data-toggle="tooltip" data-placement="bottom" />
				</div>
				<div class="form-group">
					<textarea name="link" id="link" class="form-control" rows="3" title="Paste the URL here" data-toggle="tooltip" data-placement="bottom"></textarea>
				</div>
				<div class="form-group">
					<select name="genre" id="genre" class="form-control" title="Select Genre" data-toggle="tooltip" data-placement="bottom" value="{{ old('genre') }}">
						<option value="">Select Genre</option>
						{{ $genres = App\Genre::all() }}
						@foreach($genres as $genre)
						<option value="{{ $genre->id }}">{{ $genre->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="album" id="album" class="form-control" placeholder="Music Album" value="{{ old('album') }}" title="Enter Music Album" data-toggle="tooltip" data-placement="bottom" />
				</div>
				<div class="form-group">
					<select name="year" id="year" class="form-control" value="" title="Select Music Year Release" data-toggle="tooltip" data-placement="bottom" value="{{ old('year') }}">
						<option value="">----</option>
						@for($i = date('Y'); $i >= 1950; $i--)
							<option value="{{ $i }}">{{ $i }}</option>
						@endfor

					</select>
				</div>
				<div class="form-group">
					<!-- Google reCAPTCHA will be Place here -->
					<i>reCAPTCHA will be add here upon going online</i>
				</div>
				<div class="form-group">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<button class="btn btn-primary" type="submit">Add Music</button>
				</div>

			</form>
		</div>
	</div>
</div>
@include('includes.footer')
@endsection