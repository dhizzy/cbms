<?php
	if(count($titleVolumes)>0){
		echo "<label>Select volume</label>
		<select name='volume' id='volumeSelectbox' onchange='getIssues()'>
		<option value = ''>Select Volume</option>";
		foreach($titleVolumes as $titleVolume){
			echo "<option value = '" . $titleVolume->id . "'>" . $titleVolume->volume . "</option>";
		}
		echo "</select>";
	}else{
		echo "No volumes for this title.";
	}
?>
