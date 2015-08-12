<?php 


use Aura\Di\Container;
use Aura\Di\Factory;
$di = new Container(new Factory());


$di->params['J'] = ['i' => $di->lazyNew('I')];
$di->params['I'] = ['h' => $di->lazyNew('H')];
$di->params['H'] = ['g' => $di->lazyNew('G')];
$di->params['G'] = ['f' => $di->lazyNew('F')];
$di->params['F'] = ['e' => $di->lazyNew('E')];
$di->params['E'] = ['d' => $di->lazyNew('D')];
$di->params['D'] = ['c' => $di->lazyNew('C')];
$di->params['C'] = ['b' => $di->lazyNew('B')];
$di->params['B'] = ['a' => $di->lazyNew('A')];


//trigger autoloader for all required files
$a = $di->newinstance('J');
unset ($a);

$t1 = microtime(true);




for ($i = 0; $i < 10000; $i++) {
	$j = $di->newinstance('J');
}

$t2 = microtime(true);

$results = [
'time' => $t2 - $t1,
'files' => count(get_included_files()),
'memory' => memory_get_peak_usage()/1024/1024
];

echo json_encode($results);