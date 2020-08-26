#! /usr/bin/env php
<?php
/**
 * Created by SlimApp.
 *
 * Date: 2020-08-26
 * Time: 07:23
 */


use Oasis\CustomizeApi\CustomizeApi;

/** @var CustomizeApi $app */
$app = require_once __DIR__ . "/../bootstrap.php";

$app->getConsoleApplication()->run();

