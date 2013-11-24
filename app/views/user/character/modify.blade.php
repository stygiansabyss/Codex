{{ Form::model($character, array('class' => 'form-horizontal')) }}
	<div class="row-fluid">
		<div class="span6">
			<div class="well">
				<div class="well-title">Add new Character</div>
				{{ Form::horizontalRow('text', 'name', Input::old('name'), array('required' => 'required'), 'label', 'Name') }}
				{{ Form::horizontalRow('text', 'alias', Input::old('alias'), array(), 'label', 'Alias') }}
				{{ Form::horizontalRow('select', 'race_id', $raceArray, null, 'label', 'Race')}}
				{{ Form::horizontalRow('checkbox', 'siteRollFlag', null, null, 'label', '<a href="#helpModal" data-toggle="modal" class="fa fa-white fa fa-question-circle"></a> Site Rolled Stats') }}
				<div class="controls">
					{{ Form::submit('Add Character', array('class' => 'btn btn-small btn-primary')) }}
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="well">
				<div class="well-title">Stats</div>
					<table class="table table-condensed table-hover table-striped" id="stats">
						<thead>
							<tr>
								<th>Name</th>
								<th>Starting Dice</th>
								<th>Cap</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}

<div id="helpModal" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 id="myModalLabel">
					Help
				</h4>
			</div>
			<div class="modal-body">
				<div class="well well-small">
					<ul>
						<li>If you check this box, the site will roll your character's stats and submit them to the GM for approval.</li>
						<li>If you would like to roll that stats yourself, leave this unchecked and submit your rolls directly to the GM for approval and submission.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	@section('onReadyJs')
		$('select[name="race_id"]').on('change', function () {
			var race_id = $(this).find("option:selected").val();

			$.getJSON('/user/characters/get-race-stats/'+ race_id, function (data) {
				$('#stats tbody').empty();

				$.each(data, function (index,raceStat) {
					row = '<tr>'+
						'<td>'+ raceStat.name +'</td>'+
						'<td>'+ raceStat.startingDice +'</td>'+
						'<td>'+ raceStat.cap +'</td>'+
					'</tr>';

					$('#stats tbody').append(row);
				});
			});
		});

		function createRow(raceStat) {
			row = '<div class="control-group">'+
				'<label class="control-label" for="'+ raceStat.id +'">'+ raceStat.name +'</label>'+
				'<div class="controls">'+
					'<input type="text" name="stat['+ raceStat.id +']" />'+
				'</div>'+
			'</div>';

			return row;
		}
	@stop
</script>