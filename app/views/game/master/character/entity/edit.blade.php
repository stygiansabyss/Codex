@section('css')
	{{ HTML::style('/vendor/jansyBootstrap/dist/extend/css/jasny-bootstrap.min.css') }}
@stop

{{ Form::model($entity, array('class' => 'form-horizontal', 'files' => true)) }}
<div class="row-fluid">
	<div class="span12">
		<div class="well">
			{{ Form::horizontalRow('text', 'name', Input::old('name'),  array('id' => 'name', 'placeholder' => 'Name', 'required' => 'required'), 'label', 'Name') }}
			{{ Form::horizontalRow('textarea', 'description', Input::old('description'),  array('id' => 'description', 'placeholder' => 'Description'), 'label', 'Description') }}
			{{ Form::horizontalRow('checkbox', 'activeFlag', Input::old('activeFlag'), true, 'label', 'Active') }}
			{{ Form::horizontalRow('checkbox', 'hiddenFlag', Input::old('hiddenFlag'), false, 'label', 'Hidden') }}
			<div class="control-group" id="color">
				<label class="control-label">Chat Color</label>
				<div class="controls ">
					<div class="input-prepend">
						{{ Form::text('color', null, array('id' => 'color' .'Input', 'class' => 'colorpicker', 'style' => 'height: 19px;')) }}
						<div class="colorPreview" id="colorPreview" style="background-color: #fff; width: 21px; height: 21px;display: inline-block; margin-left: 10px;">&nbsp;</div>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="avatar">Avatar</label>
				<div class="controls ">
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
							@if ($entity->image != '/img/no_user.png')
								{{ HTML::image($entity->image) }}
							@endif
						</div>
						<div>
							<span class="btn btn-small btn-primary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="avatar"></span>
							<a href="#" class="btn btn-small btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="controls">
				{{ Form::submit('Submit', array('class' => 'btn btn-small btn-primary')) }}
				{{ Form::reset('Reset Fields', array('class' => 'btn btn-small btn-primary')) }}
			</div>
		</div>
	</div>
</div>
<?=Form::close();?>

@section('jsInclude')
	{{ HTML::script('vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
	{{ HTML::script('vendor/jansyBootstrap/dist/extend/js/jasny-bootstrap.min.js') }}
@stop

<script>
	@section('onReadyJs')
		$('.colorpicker').colorpicker().on('changeColor', function(ev){
			$('#colorPreview').css('background-color', ev.color.toHex());
		});
	@stop
</script>

@section('js')
	<script>
		function changeColor(type) {
			if (type == 'grey') {
				var color = $('#greyInput').val();

				$('body').css('background-color', color);
			} else if (type == 'primary') {
				var color = $('#primaryInput').val();

				$('.primary').css('background-color', color);
			}
		}

		function revertColor(type, color) {
			if (type == 'grey') {
				$('#greyInput').val(color);
				$('body').css('background-color', color);
			}
		}
	</script>
@stop