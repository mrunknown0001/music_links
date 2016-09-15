<div class="row">
	<div class="col-md-3">
		<h3>Search <a href="{{ route('home') }}">M</a><a href="{{ route('dashboard') }}">u</a>sic Links</h3>
		<form role="form" action="{{ route('search_result') }}" method="POST">
			<div class="form-group">
				<input type="text" name="search" id="search" placeholder="Search Music Links" data-toggle="tooltip" title="Search Title" data-placement="right" />
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<button type="submit"><i class="icon-search"></i></button>
			</div>
		</form>
	</div>
	<div class="col-md-6">
		<br/>
		@include('includes.showerrors')
	</div>
</div>