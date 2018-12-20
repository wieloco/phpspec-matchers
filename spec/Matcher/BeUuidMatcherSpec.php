<?php

namespace spec\WieloCo\Matcha\Matcher;

use PhpSpec\Exception\Example\FailureException;
use PhpSpec\Matcher\Matcher;
use PhpSpec\ObjectBehavior;
use WieloCo\Matcha\Matcher\BeUuidMatcher;

class BeUuidMatcherSpec extends ObjectBehavior
{
    private const MATCHER_NAME = 'beUuid';
    
    public function it_is_initializable()
    {
        $this->shouldHaveType(BeUuidMatcher::class);
        $this->shouldImplement(Matcher::class);
    }

    public function it_should_return_true_if_call_to_matcher_is_supported()
    {
        $this->supports(self::MATCHER_NAME, '', [])->shouldReturn(true);
    }

    public function it_should_return_false_if_call_to_matcher_is_not_supported()
    {
        $this->supports('itDoesNotLookLikeAnythingToMe', '', [])->shouldReturn(false);
    }

    public function it_should_succeed_on_positive_match()
    {
        $this->positiveMatch(self::MATCHER_NAME, '7f1052a7-45c1-4009-ad27-8a8648552cd0', [])->shouldReturn(null);
        $this->positiveMatch(self::MATCHER_NAME, '00000000-0000-0000-0000-000000000000', [])->shouldReturn(null);
    }

    public function it_should_throw_an_exception_for_failing_positive_match()
    {
        $this->shouldThrow(new FailureException('Expected UUID as response but got \'null\' instead.'))
             ->duringPositiveMatch(self::MATCHER_NAME, null, []);

        $array = [0];
        $type = gettype($array);
        $this->shouldThrow(new FailureException("Expected UUID as a string as response but got '{$type}' instead."))
             ->duringPositiveMatch(self::MATCHER_NAME, $array, []);

        $this->shouldThrow(new FailureException('Expected valid UUID as response but got \'not-an-uuid\' instead.'))
             ->duringPositiveMatch(self::MATCHER_NAME, 'not-an-uuid', []);
    }

    public function it_should_succeed_on_negative_match()
    {
        $this->negativeMatch(self::MATCHER_NAME, 'not-an-uuid', [])->shouldReturn(null);
        $this->negativeMatch(self::MATCHER_NAME, [0], [])->shouldReturn(null);
        $this->negativeMatch(self::MATCHER_NAME, 1, [])->shouldReturn(null);
    }

    public function it_should_throw_an_exception_for_failing_negative_match()
    {
        $this->shouldThrow(FailureException::class)->duringNegativeMatch(self::MATCHER_NAME, '7f1052a7-45c1-4009-ad27-8a8648552cd0', []);
        $this->shouldThrow(FailureException::class)->duringNegativeMatch(self::MATCHER_NAME, '00000000-0000-0000-0000-000000000000', []);
    }

    public function it_should_have_zero_priority()
    {
        $this->getPriority()->shouldReturn(0);
    }
}
