<?php 


$container = new \Illuminate\Container\Container;

//trigger autoloader
$j = $container->make('J');


$j2 = $container->make('J');

$t1 = microtime(true);

for ($i = 0; $i < 10000; $i++) {
	$j = $container->make('J');
}

$t2 = microtime(true);

$results = [
	'time' => $t2 - $t1,
	'files' => count(get_included_files()),
	'memory' => memory_get_peak_usage()/1024/1024
];

echo json_encode($results);