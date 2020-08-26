<?php
/**
 * Created by SlimApp.
 *
 * Date: 2020-08-26
 * Time: 07:22
 */

namespace Oasis\CustomizeApi\Database;

use Doctrine\ORM\Cache\DefaultCacheFactory;
use Doctrine\ORM\Cache\RegionsConfiguration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

use Oasis\CustomizeApi\CustomizeApi;


class CustomizeApiDatabase
{
    public static function getEntityManager()
    {
        static $entityManager = null;
        if ($entityManager instanceof EntityManager) {
            return $entityManager;
        }
        
        $app = CustomizeApi::app();
    
        $isDevMode = $app->isDebug();
        /** @noinspection PhpParamsInspection */
        $config    = Setup::createAnnotationMetadataConfiguration(
            [PROJECT_DIR . "/src/Entities"],
            $isDevMode,
            $app->getParameter('app.dir.data') . "/proxies",
            $app->getService('memcached_cache'),
            false /* do not use simple annotation reader, so that we can understand annotations like @ORM/Table */
        );
        $config->addEntityNamespace("CustomizeApi", "Oasis\\CustomizeApi\\Entities");
        //$config->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());

        $regconfig = new RegionsConfiguration();
        /** @noinspection PhpParamsInspection */
        $factory   = new DefaultCacheFactory($regconfig, $app->getService('memcached_cache'));
        $config->setSecondLevelCacheEnabled();
        $config->getSecondLevelCacheConfiguration()->setCacheFactory($factory);

        $conn           = $app->getParameter('app.db');
        $conn["driver"] = "pdo_mysql";
        /** @noinspection PhpUnhandledExceptionInspection */
        $entityManager  = EntityManager::create($conn, $config);

        return $entityManager;
    }


}
