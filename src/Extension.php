<?php

namespace WieloCo\PhpSpecMatchers;

use PhpSpec\ServiceContainer;
use WieloCo\PhpSpecMatchers\Matcher\BeAnUuidMatcher;

class Extension implements \PhpSpec\Extension
{

    /**
     * @param ServiceContainer $container
     * @param array            $params
     */
    public function load(ServiceContainer $container, array $params)
    {
        $container->define(
            'wieloco.matchers.be_an_uuid',
            function ($c) {
                return new BeAnUuidMatcher();
            },
            ['matchers']
        );
    }
}