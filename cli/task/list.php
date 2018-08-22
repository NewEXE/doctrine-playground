<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 17:48
 */

require_once 'bootstrap.php';

$userId = $argv[1];

$user = $entityManager->find(User::class, $userId);

if (! $user) {
    echo 'No user found for the given id.' . PHP_EOL;
    exit(1);
}

/** @var Task[] $tasks */
$tasks = $entityManager->getRepository(Task::class)->getAllTasksByUser($user);
/** @var Task[] $expiredTasks */
$expiredTasks = $entityManager->getRepository(Task::class)->getExpiredTasksByUser($user);

echo 'All tasks:' . PHP_EOL . PHP_EOL;

foreach ($tasks as $task) {
    echo $task->getDescription() . PHP_EOL;
    echo 'Complete at: ' . $task->getCompleteAt()->format('d.m.Y') . PHP_EOL;
}

echo PHP_EOL;
echo 'Expired tasks:' . PHP_EOL . PHP_EOL;

foreach ($expiredTasks as $task) {
    echo $task->getDescription() . PHP_EOL;
    echo 'Complete at: ' . $task->getCompleteAt()->format('d.m.Y') . PHP_EOL;
}