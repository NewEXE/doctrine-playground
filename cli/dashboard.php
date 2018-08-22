<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 15:46
 */

require_once 'bootstrap.php';

$userId = $argv[1];

// Let's get a list of all open bugs the user reported
// or was assigned to that's ordered by creation date
$myBugs = $entityManager->getRepository(Bug::class)->getUsersBugs($userId);

echo 'You have created or assigned to ' . count($myBugs) . ' open bugs:' . PHP_EOL . PHP_EOL;

foreach ($myBugs as $bug) {
    echo $bug->getId() . ' - ' . $bug->getDescription() . PHP_EOL;
}