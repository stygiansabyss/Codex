<div class="row-fluid">
	<div class="span2">
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Core</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="stats">Stats</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="bases">Bases</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="vitals">Vitals</a></li>
		</ul>
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Details</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="races">Races</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="appearances">Appearances</a></li>
		</ul>
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Skills</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="skill-lists">Skill Lists</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="skills">Skills</a></li>
		</ul>
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Classes/Careers</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="classes">Classes</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="careers">Careers</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="career-spell-classes">Career Spell Classes</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="career-skills">Career Starting Skills</a></li>
		</ul>
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Spells</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="spell-classes">Spell Classes</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="spells">Spells</a></li>
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
		$.AjaxLeftTabs('/game/master/rules/', 'stats');
	@endsection
</script>