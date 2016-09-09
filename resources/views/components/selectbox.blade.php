@if(isset($selectType) && isset($item))
	
	<select id="issueSelectbox" name = "{{ $selectType }}">
	
		<option>Please select an option below</option>

		@foreach($items as $item)
		
			<option value='{{ $item->id }}' name='{{ $item->type }}'>$item->name</option>
		
		@endforeach
	
	</select>	

@else

	<p>Nothing to show here</p>

@endif

