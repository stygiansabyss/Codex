<div class="row-fluid">
	<div class="span12">
		<small>
			<ul class="breadcrumb">
				<li class="active">Manage Game <span class="divider">/</span></li>
				<li><a href="javascript: void(0);">Players</a> <span class="divider">/</span></li>
				<li><a href="javascript: void(0);">Story-Tellers</a> <span class="divider">/</span></li>
				<li><a href="javascript: void(0);">Horde Builder</a></li>
			</ul>
		</small>
	</div>
</div>
<div class="row-fluid">
	<div class="span9">
		<div class="well">
			<div class="well-title">Awaiting Story-Teller Attention</div>
		</div>
		<div class="well">
			<div class="well-title">
				<a class="accordion-toggle" data-toggle="collapse" href="#collapseCharacters" style="color: #000;" onClick="$(this).children().toggleClass('fa fa-chevron-down').toggleClass('fa fa-chevron-up');">
					Characters <i class="fa fa-chevron-down"></i>
				</a>
				<div class="well-btn well-btn-right">
					<?=HTML::linkIcon('game/character/add/', 'fa fa-plus')?>
				</div>
			</div>
			<div id="collapseCharacters" class="accordion-body collapse">

				CHARACTERS PLACEHOLDER

			</div>
		</div>
		<div class="well">
			<div class="well-title">
				<a class="accordion-toggle" data-toggle="collapse" href="#collapseEnemies" style="color: #000;" onClick="$(this).children().toggleClass('fa fa-chevron-down').toggleClass('fa fa-chevron-up');">
					Enemies <i class="fa fa-chevron-down"></i>
				</a>
				<div class="well-btn well-btn-right">
					<?=HTML::linkIcon('game/enemy/add/', 'fa fa-plus')?>
				</div>
			</div>
			<div id="collapseEnemies" class="accordion-body collapse">
				ENEMIES PLACEHOLDER
			</div>
		</div>
		<div class="well">
			<div class="well-title">
				<a class="accordion-toggle" data-toggle="collapse" href="#collapseEntities" style="color: #000;" onClick="$(this).children().toggleClass('fa fa-chevron-down').toggleClass('fa fa-chevron-up');">
					Entities ({{ $entities->count() }}) <i class="fa fa-chevron-down"></i>
				</a>
				<div class="well-btn well-btn-right">
					<?=HTML::linkIcon('game/master/character/entity/add/', 'fa fa-plus')?>
				</div>
			</div>
			<div id="collapseEntities" class="accordion-body collapse">
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Active</th>
							<th>Hidden</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($entities as $entity)
							<tr>
								<td>{{ $entity->name }}</td>
								<td>{{ $entity->active }}</td>
								<td>{{ $entity->hidden }}</td>
								<td>
									<div class="btn-group">
										{{ HTML::editButton('/game/master/character/entity/edit/'. $entity->id) }}
										{{ HTML::deleteButton('/game/master/character/entity/delete/'. $entity->id) }}
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="well">
			<div class="well-title">
				<a class="accordion-toggle" data-toggle="collapse" href="#collapsedead" style="color: #000;" onClick="$(this).children().toggleClass('fa fa-chevron-down').toggleClass('fa fa-chevron-up');">
					Dead/Inactive Characters <i class="fa fa-chevron-down"></i>
				</a>
			</div>
			<div id="collapsedead" class="accordion-body collapse">

				DEAD CHARACTERS PLACEHOLDER

			</div>
		</div>
	</div>
	<div class="span3">
		<div class="well">
			<div class="well-title">Recent Forum Activity</div>
			<table style="width: 100%;" class="table-hover">
				<tbody>
					@if (count($recentPosts) > 0)
						@foreach ($recentPosts as $post)
							<tr>
								<td class="text-center" style="width: 30px;">
									@if (isset($post->status->id))
										<?=$post->status->icon?>
									@else
										<?=$post->icon?>
									@endif
								</td>
								<td style="width: 100px;min-width: 100px;max-width: 100px;text-align: justify;text-overflow: ellipsis;word-wrap: break-word;white-space: nowrap;overflow: hidden;">
									<?=HTML::link('forum/post/view/'. $post->keyName, $post->name)?>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
		<div class="well">
			<div class="well-title">Game Notes</div>
			<table style="width: 100%;" class="table-hover">
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?=Form::open()?>
	<?=Form::hidden('character_id', null, array('id' => 'exp_character_id'))?>
	<div id="grantExp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Grant Experience to Player</h3>
		</div>
		<div class="modal-body text-center">
			<span id="exp_character_name"></span> currently has <span id="exp_character_exp"></span> experience
			<?=Form::text('exp', null, array('placeholder' => 'Experience Points', 'class' => 'span5', 'required' => 'required'))?>
			<?=Form::textarea('reason', null, array('placeholder' => 'Reason for Exp', 'class' => 'span5', 'required' => 'required'))?>
		</div>
		<div class="modal-footer">
			<?=Form::submit('Give Exp', array('class' => 'btn btn-mini btn-primary'))?>
			<button class="btn btn-mini btn-primary" data-dismiss="modal" aria-hidden="true" onClick="removeResources('exp')">Close</button>
		</div>
	</div>
<?=Form::close()?>
<script type="text/javascript">
	function removeResources(type) {
		$('#character_id').val('');
	}
</script>