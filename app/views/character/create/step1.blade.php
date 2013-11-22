	<h3 class="text-primary">Overview</h3>
	<table class="table table-condensed table-striped">
		<tbody>
			<tr>
				<td>Name</td>
				<td>{{ $character->name }}</td>
			</tr>
			<tr>
				<td>Alias</td>
				<td>{{ $character->alias }}</td>
			</tr>
			<tr>
				<td>Race</td>
				<td>{{ $character->race->name }}</td>
			</tr>
		</tbody>
	</table>