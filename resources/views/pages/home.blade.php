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
				<li><a href="browse/genre/{{ $genre->name }}">{{ $genre->name }}</a></li>
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
				<tr>
					<td>Come Together</td>
					<td>The Beatles</td>
					<td>Rock</td>
					<td>1000</td>
					<td>
						<a href="http://tylergrund.com/mp3/Beatles/04%20Come%20Together.mp3">Download</a>
					</td>
				</tr>
				<tr>
					<td>As Long As It Matters by gin blossoms as long as it matters</td>
					<td>Gin Blossoms</td>
					<td>Alternative</td>
					<td>500</td>
					<td>
						<a href="http://hcmaslov.d-real.sci-nnov.ru/public/mp3/Eagles/Eagles%20'Hotel%20California'.mp3">Download</a>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
@include('includes.footer')
@endsection