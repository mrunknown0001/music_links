<h3>Search Music Links</h3>
<form role="form" action="{{ route('search_result') }}" method="POST">
	<div class="form-group">
		<input type="text" name="search" id="search" placeholder="Search Music Links" data-toggle="tooltip" title="Search Artist, Title, Genre, Year, etc" data-placement="right" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<button type="submit"><i class="icon-search"></i></button>
	</div>
</form>