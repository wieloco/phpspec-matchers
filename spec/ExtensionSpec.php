<?php

namespace spec\WieloCo\PhpSpecMatchers;

use PhpSpec\Extension;
use PhpSpec\ObjectBehavior;
use PhpSpec\ServiceContainer;
use Prophecy\Argument;

class ExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Extension::class);
        $this->shouldImplement(\PhpSpec\Extension::class);
    }
    public function it_should_define_the_be_an_uuid_matcher(ServiceContainer $container)
    {
        $this->load($container, []);
        $container->define('wieloco.matchers.be_an_uuid', Argument::type('callable'), ['matchers'])->shouldHaveBeenCalled();
    }
}
