<?php

error_reporting(E_ALL);
function allVariations($productName, $productVariations)
{
	$final = array();

	make($productName, $productVariations, $final);

	return $final;
}

function make($productName, $productVariations,& $final, $keyArray = array())
{

$currentVariation = array_shift($productVariations);

foreach($currentVariation as $Variation)
{
$keyArray[] = $Variation;
if(count($productVariations)>0)
{

make($productName, $productVariations,$final, $keyArray);
}
else
{
$final[] = $productName . ' - ' . implode(', ', $keyArray);
}

array_pop($keyArray);

}

}

$product_name = 'iPad';
$variations = array(
 	'color' => array('black', 'white'),
 	'memory' => array('16GB', '32GB', '64GB'),
 	'network' => array('Wifi Only', '3G & Wifi')
);

$final = allVariations($product_name, $variations );

echo "<pre>";

print_r($final);
