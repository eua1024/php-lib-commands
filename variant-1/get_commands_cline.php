<?php
	$list = get_defined_functions();

	$result = [];
	foreach ($list['internal'] as $item) {
		if (preg_match_all("/Function \[ <internal:(.*)> function (.*) \] {/", exec("php --rf ".$item." | grep function"), $matches)) {
			$result[$matches[1][0]][] = $matches[2][0];
		}
	}

	echo PHP_EOL."PHP version: ".phpversion().PHP_EOL;

	foreach ($result as $library => $lib_commands) {
		echo PHP_EOL."= PHP ".$library." library =".PHP_EOL;

		foreach ($lib_commands as $command) {
			echo $command.PHP_EOL;
		}
	}
?>