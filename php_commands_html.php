<?php
	$clist = get_defined_functions();

	$result = array();
	foreach ($clist['internal'] as $item) {
		if (preg_match_all("/Function \[ <internal:(.*)> function (.*) \] {/", exec("php --rf ".$item." | grep function"), $matches)) {
			$result[$matches[1][0]][] = $matches[2][0];
		}
	}
?>

<style>
	body {
		font-family: Arial, sans-serif;
		padding: 20px 30px;
	}

	#lib_list a {
		display: block;
	}

	a {
		text-decoration: none;
	}

	a:hover {
		color: red;
	}
</style>

<h1>PHP version: <?php echo PHP_VERSION; ?></h1>
<h3>Binary file: <?php echo PHP_BINARY; ?></h3>

<div id="lib_list">
	PHP libraries:
	<?php foreach ($result as $lib_name => $lib_commands): ?>
		<a href="#<?php echo $lib_name; ?>"><?php echo $lib_name; ?></a>
	<?php endforeach; ?>	
</div>

<?php foreach ($result as $lib_name => $lib_commands): ?>
	<h2 id="<?php echo $lib_name; ?>">PHP <?php echo $lib_name; ?> library: <a href="#">&uarr;</a></h2>
	<ul>
		<?php foreach ($lib_commands as $command): ?>
			<li><?php echo $command; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endforeach; ?>