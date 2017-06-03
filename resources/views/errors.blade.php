@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Error:</strong>
		<ul>
			@foreach ($errors->all() as $err)
				<li>{{ $err }}</li>
			@endforeach
		</ul>
	</div>
@endif