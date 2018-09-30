<?php
	$lib_list = get_loaded_extensions();

	$result = array();
	foreach ($lib_list as $lib_name) {
		$result[$lib_name][] = get_extension_funcs($lib_name);
	}

	echo PHP_EOL."PHP version: ".phpversion().PHP_EOL;

	foreach ($result as $library => $lib_commands) {
		echo PHP_EOL."= PHP ".$library." library =".PHP_EOL;

		foreach (array_shift($lib_commands) as $command) {
			echo $command.PHP_EOL;
		}
	}
?>