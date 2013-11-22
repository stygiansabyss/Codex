<div class="row-fluid">
	<div class="span2">
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Skills</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="skill-lists">Skill Lists</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="skill-list-percentiles">Skill List Percentiles</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="skills">Skills</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="abilities">Abilities</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="ability-bonuses">Ability Bonuses</a></li>
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
		$.AjaxLeftTabs('/game/master/skills/', 'skill-lists');
	@endsection
</script>