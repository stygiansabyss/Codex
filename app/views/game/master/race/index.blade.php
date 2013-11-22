<div class="row-fluid">
	<div class="span2">
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Races</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="races">Races</a></li>
			@foreach ($races as $race)
				<li><a href="javascript: void(0);" class="ajaxLink" id="race-stats/{{ $race->id }}">{{ $race->name }} Stats</a></li>
			@endforeach
		</ul>
	</div>
	<div class="span10">
		<div id="ajaxContent">
			Loading
		</div>
	</div>
</div>

<script>
	@section('onReadyJs')
		$.AjaxLeftTabs('/game/master/races/', 'races');
	@endsection
</script>