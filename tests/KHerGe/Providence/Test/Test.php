<?php

namespace KHerGe\Providence\Test;

/**
 * The test class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Test extends AbstractClass
{
    /**
     * The test property.
     *
     * @var mixed
     */
    private $testProperty = 'The test value.';

    /**
     * The test method.
     *
     * @param integer $number A number.
     *
     * @return integer The result.
     */
    private function testMethod(int $number) : int
    {
        return $number * 2;
    }
}
