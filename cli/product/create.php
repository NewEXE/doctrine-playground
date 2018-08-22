<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 21.08.18
 * Time: 17:49
 */

require_once 'bootstrap.php';

$name = $argv[1];

$product = new Product();
$product->setName($name);

$entityManager->persist($product);
$entityManager->flush();