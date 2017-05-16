<?php
	$bodyClasses = $bodyClasses ?? [];
	
	/* Takes an array of classes and returns the class atribute */
	function getClasses() {
		global $bodyClasses;
		return 'class="' . implode(' ', $bodyClasses) . '"';
	}