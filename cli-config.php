<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 31.08.18
 * Time: 14:04
 */

use Symfony\Component\Console\Helper\HelperSet;
use \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use \Symfony\Component\Console\Helper\QuestionHelper;

require_once 'bootstrap.php';

$db = $entityManager->getConnection();

$helperSet = new HelperSet([
    'em'        => new EntityManagerHelper($entityManager),
    'db'        => new ConnectionHelper($db),
    'question'  => new QuestionHelper(),
]);

return $helperSet;