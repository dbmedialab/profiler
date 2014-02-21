@if(!empty($sql_explain_log))
	<table>
		@foreach($sql_explain_log as $log)
			<tr>
				<th colspan="6">Query</th>
				<th colspan="3">Bindings</th>
				<th>Time</th>
			</tr>
			<tr>
				<td colspan="6"><pre class="prettyprint languague-sql">{{ $log["query"] }}</pre></td>
				<td colspan="3">
					@foreach($log['bindings'] as $k => $binding)
					@if(is_object($binding) || is_array($binding))
						<?php $binding = print_r($binding, true); ?>
					@endif
					@if($k != count($log['bindings'])-1)
						{{ $binding }},
					@else
						{{ $binding }}
					@endif
				@endforeach
				</td>
				<td>{{ $log["time"] }}</td>
			</tr>
			<tr>
				<th>Id.</th>
				<th>Select Type</th>
				<th>Table</th>
				<th>Type</th>
				<th>Possible Keys</th>
				<th>Key</th>
				<th>Key Length</th>
				<th>Ref</th>
				<th>Rows</th>
				<th>Extra</th>
			</tr>
			@foreach($log["explain"] as $ex)
				<tr>
					<td>{{ $ex->id }}</td>
					<td>{{ $ex->select_type }}</td>
					<td>{{ $ex->table }}</td>
					<td>{{ $ex->type }}</td>
					<td>{{ $ex->possible_keys }}</td>
					<td>{{ $ex->key }}</td>
					<td>{{ $ex->key_len }}</td>
					<td>{{ $ex->ref }}</td>
					<td>{{ $ex->rows }}</td>
					<td>{{ $ex->Extra }}</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="10"><hr></td>
			</tr>
		@endforeach
	</table>
@else
	<span class="anbu-empty">There have been no SQL queries executed.</span>
@endif