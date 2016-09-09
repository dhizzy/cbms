<?php
	echo "<select><option>Select publisher</option>";
	foreach ($publishers as $publisher){
		echo "<option>" . $publisher->name . "</option>";
	}
	echo "</select>";
?>