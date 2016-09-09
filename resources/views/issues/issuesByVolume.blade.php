
<div class='col-sm-6' id=''>
	
		<p>Add an issue. If you wish to add a group of issues, simply enter each of the issues</p>
		<label>Add Issue</label>
		<input name='issue' type='text' id='issuesToAdd'>
            <button type='submit' class='btn btn-default'>
                <i class='fa fa-btn fa-plus'></i>Add Issue
            </button>
	</form>
</div>

<?php
	echo "<div id='issues' class='col-sm-8'><ul class='list-group'>";
	if(count($issues)>0){
		foreach($issues as $issue){
			echo "<li class='list-group-item' issuenum = '" . $issue->id . "'>" . $issue->name . " - " . $issue->issue . "</li>";
		}				
	}else{
		echo "<li class='list-group-item'>No issues in this volume</li>";
	}
	echo "</ul></div>";
?>
