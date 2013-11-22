<div class="row-fluid">
	<div class="span2">
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Spells</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="spell-classes">Spell Classes</a></li>
			@foreach ($spellClasses as $spellClass)
				<li><a href="javascript: void(0);" class="ajaxLink" id="spells/{{ $spellClass->id }}">{{ $spellClass->name }} Spells</a></li>
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
		$.AjaxLeftTabs('/game/master/spells/', 'spell-classes');
	@endsection
</script>