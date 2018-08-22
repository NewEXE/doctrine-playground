<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 21.08.18
 * Time: 17:49
 */

require_once 'bootstrap.php';

$productRepository = $entityManager->getRepository('Product');

/** @var Product[] $products */
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo $product->getName() . PHP_EOL;
}