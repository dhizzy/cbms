@extends('layouts.app')

@section('content')

@include('common.errors')
<form action="{{ url('issues')}}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
	<div class='row'>
		<div class='col-sm-4'>
			<label>Title</label>
			<select name='title' id='titleSelectbox' onchange = 'getVolume()'>
				<option value=''>Select title</option>
				<?php
					foreach($titles as $title){
						echo "<option value=" . $title->id . " > " . $title->name ." </option>";
					}
				?>
			</select>
		</div>
<!--	TODO: ADD PUBLISHER
 		<div id="publisherContainer" class='col-sm-4'>
			<label>Publisher</label>
			
		</div> -->
		<div id="volumeContainer" class='col-sm-4'>


		</div>

	</div>

<div id="issuesContainer" class='row'>

</div>
</form>

@endsection