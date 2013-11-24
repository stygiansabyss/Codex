<div class="row-fluid">
	<div class="span6">
		<div class="well">
			<div class="well-title">Campaign Characters</div>
			{{ HTML::table() }}
				<thead>
					<tr>
						<th>Campaign</th>
						<th>Character</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
	<div class="span6">
		<div class="well">
			<div class="well-title">
				Created characters
				<div class="well-btn well-btn-right">
					{{ HTML::addButton('/user/characters/add') }}
				</div>
			</div>
			{{ HTML::table() }}
				<thead>
					<tr>
						<th>Name</th>
						<th>Race</th>
						<th>Stats</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if ($characters->count() > 0)
						@foreach ($characters as $character)
							<tr>
								<td>{{ $character->name }}</td>
								<td>{{ $character->race->name }}</td>
								<td>&nbsp;</td>
								<td>
									<div class="btn-group">
										{{ HTML::editButton('/user/characters/edit/'. $character->id) }}
										{{ HTML::deleteButton('/user/characters/delete/'. $character->id) }}
									</div>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="4">No characters added yet.</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>