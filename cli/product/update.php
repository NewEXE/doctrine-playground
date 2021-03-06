<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 21.08.18
 * Time: 17:49
 */

require_once 'bootstrap.php';

$id = $argv[1];
$name = $argv[2];

/** @var Product $product */
$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo 'No product found.' . PHP_EOL;
    exit(1);
}

$product->setName($name);

$entityManager->flush();