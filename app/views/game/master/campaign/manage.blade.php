<div class="row-fluid">
	<div class="offset1 span10">
		<div class="well">
			<div class="well-title">Campaign Management</div>
			{{ HTML::table() }}
				<thead>
					<tr>
						<th>Name</th>
						<th>GMs</th>
						<th>Approved Characters</th>
						<th class="text-right">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($campaigns as $campaign)
						<tr>
							<td>{{ $campaign->name }}</td>
							<td>{{ $campaign->gms->count() }}</td>
							<td>{{ $campaign->characters->count() }}</td>
							<td class="text-right">
								<div class="btn-group">
									{{ HTML::editButton('/game/master/campaign/edit/'. $campaign->id) }}
								</div>
							</td>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>