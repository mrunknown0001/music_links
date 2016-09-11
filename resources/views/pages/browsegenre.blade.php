@extends('layouts.app')

@section('title') Browse By Genre @endsection

@section('content')
<div class="container-fluid">

	@include('includes.search')

	<div class="row">
		<section class="col-md-2">
			<strong>Browse by Genre</strong>
			<ul>
			@foreach($genres as $genre)
				<li><a href="{{ route('browse_by_genre', [$genre->id, $genre->name] ) }}">{{ $genre->name }}</a></li>
			@endforeach
			</ul>
		</section>
		<div class="col-md-10">
			<strong>Browse by Genre: {{ $g }} - {{ $musics->count() }} of {{ $musics->total() }} {{ count($musics) > 1? 'songs':'song' }}</strong>
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Artist</th>
						<th>Genre</th>
						<th>Download Count</th>
						<th>Download Link</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($musics as $music)
						<tr>
							<td>{{ $music->title }}</td>
							<td>{{ $music->artist->name }}</td>
							<td><a href="{{ route('browse_by_genre',[$music->genre->id, $music->genre->name]) }}">{{ $music->genre->name }}</a></td>
							<td>{{ $music->downloadcount->counts }}</td>
							<td><a href="{{ route('music_download',$music->link->id) }}">Download</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@if(count($musics) < 1)
				<strong>There are no available music.</strong>
			@endif


			{{ $musics->render() }}
		</div>
	</div>

</div>
@include('includes.footer')
@endsection