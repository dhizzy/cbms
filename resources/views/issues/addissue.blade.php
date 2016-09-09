@extends('layouts.app')

@section('content')

<script type = 'javascript'>

</script>

<form>
	

	<label>Title</label>
	<select id='titleSelectbox' onchange = 'getVolume()'>
		<option value=''>Select title</option>
		<?php
			foreach($titles as $title){
				echo "<option value=" . $title->id . " > " . $title->name ." </option>";
			}
		?>
	</select>

	<div id="volumeContainer">


	</div>


	<div id="issuesContainer">

	</div>

</form>
@endsection