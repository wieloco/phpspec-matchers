<?php

namespace WieloCo\PhpSpecMatchers\Matcher;

use PhpSpec\Exception\Example\FailureException;
use PhpSpec\Matcher\Matcher;
use PhpSpec\Wrapper\DelayedCall;
use Ramsey\Uuid\Uuid;

class BeAnUuidMatcher implements Matcher
{

    /**
     * Checks if matcher supports provided subject and matcher name.
     *
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     *
     * @return Boolean
     */
    public function supports(string $name, $subject, array $arguments): bool
    {
        return $name === 'beAnUuid';
    }

    /**
     * Evaluates positive match.
     *
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     *
     * @throws FailureException
     */
    public function positiveMatch(string $name, $subject, array $arguments): ?DelayedCall
    {
        if (null === $subject) {
            throw new FailureException(
                'Expected UUID as response but got \'null\' instead.'
            );
        }
        if (!is_string($subject)) {
            $type = gettype($subject);
            throw new FailureException(
                "Expected UUID as a string as response but got '{$type}' instead."
            );
        }
        if (!Uuid::isValid($subject)) {
            throw new FailureException(
                "Expected valid UUID as response but got '{$subject}' instead."
            );
        }

        return null;
    }

    /**
     * Evaluates negative match.
     *
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     *
     * @throws FailureException
     */
    public function negativeMatch(string $name, $subject, array $arguments): ?DelayedCall
    {
        if (null !== $subject && is_string($subject) && Uuid::isValid($subject)) {
            throw new FailureException('The return value should not be a valid UUID.');
        }

        return null;
    }

    /**
     * Returns matcher priority.
     *
     * @return integer
     */
    public function getPriority(): int
    {
        return 0;
    }
}
