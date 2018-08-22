<?php
/**
 * Usage:
 * php cli/task/create.php "General cleanup at home" "next Sunday" 1
 *
 * Where:
 * "General cleanup at home" - task description;
 * "next Sunday" - complete at (in PHP-supported Date and Time format)
 * 1 - user id
 */

require_once 'bootstrap.php';

$description = $argv[1];
$time = $argv[2];
$userId = $argv[3];

$user = $entityManager->find(User::class, $userId);

if (! $user) {
    echo 'No user found for the given id.' . PHP_EOL;
    exit(1);
}

if (! strtotime($time)) {
    echo 'Incorrect time value passed. You must pass value in PHP-supported Date and Time format' . PHP_EOL;
    exit(2);
}

$task = new Task($description, new DateTime($time), $user);

$entityManager->persist($task);
$entityManager->flush();

echo 'Your new Task Id: ' . $task->getId() . PHP_EOL;