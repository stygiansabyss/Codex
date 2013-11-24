{{ Form::model($campaign, array('class' => 'form-horizontal')) }}
	<div class="row-fluid">
		<div class="span6">
			<div class="well">
				<div class="well-title">Add new Campaign</div>
				{{ Form::horizontalRow('text', 'name', Input::old('name'), array('required' => 'required'), 'label', 'Name') }}
				{{ Form::horizontalRow('text', 'keyName', Input::old('keyName'), array('required' => 'required'), 'label', 'Key Name') }}
				{{ Form::horizontalRow('textarea', 'description', Input::old('description'), array(), 'label', 'Description') }}
				<div class="controls">
					{{ Form::submit('Edit Campiagn', array('class' => 'btn btn-small btn-primary')) }}
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="well">
				<div class="well-title">Campaign GMs</div>
				<div class="control-group">
					<div class="controls">
						@foreach ($users as $user)
							<?php
								$checked = $campaign->isGm($user->id) == true ? ' checked="checked"' : null;
							?>
							<label class="checkbox">
								<input type="checkbox" name="user_id[{{ $user->id }}]"{{ $checked }}/>
								{{ $user->username }}
							</label>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}