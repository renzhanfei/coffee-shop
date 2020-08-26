<?php
/**
 * Created by SlimApp.
 *
 * Date: 2020-08-26
 * Time: 07:23
 */

use Oasis\CustomizeApi\CustomizeApi;
use Oasis\CustomizeApi\CustomizeApiConfiguration;

require_once __DIR__ . "/vendor/autoload.php";

define('PROJECT_DIR', __DIR__);

/** @var CustomizeApi $app */
$app = CustomizeApi::app();
$app->init(__DIR__ . "/config", new CustomizeApiConfiguration(), __DIR__ . "/cache/config");

return $app;

