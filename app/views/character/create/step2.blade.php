	<div class="row-fluid">
		<div class="span6">
			<h3 class="text-primary">Class and career selection</h3>
			{{ Form::horizontalRow('select', 'class_id', $classArray, array('id' => 'class_id', 'placeholder' => 'Class'), 'label', 'Class') }}
		</div>
		<div class="span6">
			@foreach ($classes as $classs)
				<h4 class="text-primary">{{ $classs->name }}</h4>
				<ul class="inline">
					@foreach ($classs->careers as $career)
						<li>{{ $career->name }}</li>
					@endforeach
				</ul>
			@endforeach
		</div>
	</div>