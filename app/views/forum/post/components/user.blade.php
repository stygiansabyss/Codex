@extends('core.forum.post.components.user')

@section('authorName')
	@if ($post->character != null)
		<span class="lead">{{ $post->character->name }}</span>
	@else
		@parent
	@endif
@stop

@section('authorAvatar')
	@if ($post->character != null)
		{{ HTML::image($post->character->image, null, array('class'=> 'img-polaroid', 'style' => 'width: 100px;')) }}
		<br />
		<small>
			Posts: {{ $post->character->postsCount }}
	@else
		@parent
	@endif
@stop