<?php

namespace WieloCo\Matcha;

use PhpSpec\ServiceContainer;
use WieloCo\Matcha\Matcher\BeUuidMatcher;

class Extension implements \PhpSpec\Extension
{

    /**
     * @param ServiceContainer $container
     * @param array            $params
     */
    public function load(ServiceContainer $container, array $params)
    {
        $container->define(
            'wieloco.matchers.be_uuid',
            function ($c) {
                return new BeUuidMatcher();
            },
            ['matchers']
        );
    }
}
