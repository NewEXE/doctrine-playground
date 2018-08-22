<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 13:38
 */

require_once 'bootstrap.php';

$dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created_at DESC";

$query = $entityManager->createQuery($dql)->setMaxResults(30);
$bugs = $query->getResult();
//or $bugs = $query->getArrayResult();

// Using repository
/*
$bugRepository = $entityManager->getRepository('Bug');
$bugs = $bugRepository->findAll();
*/

/** @var Bug $bug */
foreach ($bugs as $bug) {
    echo $bug->getDescription()." - ".$bug->getCreatedAt()->format('d.m.Y')."\n";
    echo "    Reported by: ".$bug->getReporter()->getName()."\n";
    echo "    Assigned to: ".$bug->getEngineer()->getName()."\n";
    foreach ($bug->getProducts() as $product) {
        echo "    Platform: ".$product->getName()."\n";
    }
    echo "\n";
    echo 'SQL Query: ' . $query->getSQL() . PHP_EOL;
}