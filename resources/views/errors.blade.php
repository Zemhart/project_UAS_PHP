@if (count($errors) > 0)
	<strong>Error:</strong>
	<ul>
		@foreach ($errors->all() as $err)
			<li>{{ $err }}</li>
		@endforeach
	</ul>
@endif