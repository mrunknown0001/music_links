@if(session('success'))
	<div class="alert alert-success text-center">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<b>{{ session('success') }}</b>
	</div>
@endif