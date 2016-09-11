@extends('layouts.app')

@section('title') Music Links @endsection

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
			<strong>Most Downloaded</strong>
			
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
					@foreach($musics as $m)
						<tr>
							<td>{{ $m->music->title }}</td>
							<td><a href="{{ route('browse_by_artist', [$m->music->artist->id, $m->music->artist->name]) }}">{{ $m->music->artist->name }}</a></td>
							<td><a href="{{ route('browse_by_genre',[$m->music->genre->id, $m->music->genre->name]) }}">{{ $m->music->genre->name }}</a></td>
							<td>{{ $m->counts }}</td>
							<td><a href="{{ route('music_download',$m->music->link->id) }}">Download</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@if(count($musics) == 0)
				<strong>There are no available music.</strong>
			@endif
		</div>
	</div>

</div>
@include('includes.footer')
@endsection