<?php
/**
 * Created by SlimApp.
 *
 * Date: 2020-08-26
 * Time: 07:22
 */
 
 
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Oasis\CustomizeApi\Database\CustomizeApiDatabase;

require_once __DIR__ . "/../bootstrap.php";

return ConsoleRunner::createHelperSet(CustomizeApiDatabase::getEntityManager());
