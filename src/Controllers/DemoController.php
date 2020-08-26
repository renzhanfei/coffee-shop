<?php
/**
 * Created by SlimApp.
 *
 * Date: 2020-08-26
 * Time: 07:23
 */

namespace Oasis\CustomizeApi\Controllers;

use Symfony\Component\HttpFoundation\Response;

class DemoController
{
    public function testAction()
    {
        return new Response('Hello World!');
    }
}

