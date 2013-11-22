<div class="row-fluid">
	<div class="span10">
		<small>
			<ul class="breadcrumb">
				<li>{{ HTML::link('forum', 'Forums') }} <span class="divider">/</span></li>
				<li>{{ HTML::link('forum/category/view/'. $board->category->uniqueId, $board->category->name) }} <span class="divider">/</span></li>
				<li>{{ HTML::link('forum/board/view/'. $board->uniqueId, $board->name) }} <span class="divider">/</span></li>
				<li class="active">Add Post</li>
			</ul>
		</small>
		<div class="well">
			<div class="well-title">New post</div>
			<div class="row-fluid">
				{{ Form::open() }}
					<div class="control-group">
						<div class="controls text-center">
							{{ Form::select('forum_post_type_id', $types, array(1), array('class' => 'span10')) }}
						</div>
					</div>
					<div class="control-group">
						<div class="controls text-center">
							{{ Form::select('morph', $postAsArray, 0, array('class' => 'span10')) }}
						</div>
					</div>
					<div class="control-group">
						<div class="controls text-center">
							{{ Form::text('name', Input::old('name'), array('placeholder' => 'Title', 'class' => 'span10', 'tabindex' => 1)) }}
						</div>
					</div>
					<?php $content =null; ?>
					@include('core.forum.post.components.quickreplybuttons')
					<div class="controls text-center">
						{{ Form::submit('Post', array('class' => 'btn btn-small btn-primary span3', 'tabindex' => 3)) }}
					</div>
				{{ Form::close() }}
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>