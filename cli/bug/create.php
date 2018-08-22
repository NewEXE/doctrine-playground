<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 13:06
 */

require_once 'bootstrap.php';

$reporterId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(',', $argv[3]);

/** @var User $reporter */
$reporter = $entityManager->find('User', $reporterId);
/** @var User $engineer */
$engineer = $entityManager->find('User', $engineerId);

if (! $reporter || ! $engineer) {
    echo 'No reporter and/or engineer found for the given id(s).' . PHP_EOL;
    exit(1);
}

$bug = new Bug();
$bug->setDescription('Something does not work!');
$bug->setCreatedAt(new DateTime());
$bug->setStatus('OPEN');

foreach ($productIds as $productId) {
    /** @var Product $product */
    $product = $entityManager->find('Product', $productId);
    $bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo 'Your new Bug Id: ' . $bug->getId() . PHP_EOL;