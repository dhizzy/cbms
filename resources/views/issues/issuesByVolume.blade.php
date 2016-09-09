

	<div>
		<?php
			if(count($issues)>0){
				foreach($issues as $issue){
					echo "<p issuenum = '" . $issue->id . "'>" . $issue->issue . "</p>";
				}				
			}else{
				echo "<p>No issues in this volume</p>";
			}
		?>
	</div>

