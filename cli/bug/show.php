<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 22.08.18
 * Time: 15:22
 */

use Doctrine\Common\Util\Debug;

require_once 'bootstrap.php';

$bugId = $argv[1];

$bug = $entityManager->find('Bug', (int) $bugId);

Debug::dump($bug);
echo PHP_EOL;

echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
