<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 31.08.18
 * Time: 14:48
 */

return [
    'name'                  => 'Doctrine Sandbox Migrations',
    'migrations_namespace'  => 'Migrations',
    'table_name'            => 'doctrine_migration_versions',
    'migrations_directory'  => realpath('src/Migrations'),
];