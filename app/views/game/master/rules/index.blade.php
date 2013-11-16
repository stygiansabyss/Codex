<div class="row-fluid">
	<div class="span2">
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Core</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="stats">Stats</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="bases">Bases</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="skills">Skills</a></li>
		</ul>
		<ul class="nav nav-tabs nav-stacked">
			<li class="nav-title">Details</li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="races">Races</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="classes">Classes</a></li>
			<li><a href="javascript: void(0);" class="ajaxLink" id="careers">Careers</a></li>
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