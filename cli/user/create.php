<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 13:06
 */

require_once 'bootstrap.php';

$name = $argv[1];

$user = new User($name);

$entityManager->persist($user);
$entityManager->flush();

echo 'Created User with ID ' . $user->getId() . PHP_EOL;