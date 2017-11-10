<?php $this->Html->script('app', ['block' => true]); ?>

<div class="col-md-4 col-md-offset-4">
	<form action="consoles/add.json" class="form-inline" role="form" id="add-console">
		<div class="form-group">
		 	<div class="input-append" id="console-input">
			  <input class="form-control input-lg" name="console" type="text" id="inputLarge" placeholder="Enter a console...">
			  <button type="button" class="btn btn-primary btn-lg" id="submitButton">Add Console</button>
		  	</div>
	  	</div>
	</form>
	<div class="task-container" id="consoles">
		<form action="consoles/finish.json" class="form-inline" role="form" id="finish-console">
			<div id="incomplete-label"><h5>Consoles :</h5></div>
			<div class="form-group" id="incomplete-consoles"></div>
		</form>
	</div>
	<div class="task-container">
		<div id="done-label"><h5>Recently Deleted...</h5></div>
		<div id="done"></div>
	</div>
</div>