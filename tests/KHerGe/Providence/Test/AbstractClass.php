<?php

namespace KHerGe\Providence\Test;

/**
 * An abstract class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
abstract class AbstractClass
{
    /**
     * The abstract property.
     *
     * @var mixed
     */
    private $abstractProperty = 'The abstract value.';

    /**
     * The abstract method.
     *
     * @param integer $number A number.
     *
     * @return integer A result.
     */
    private function abstractMethod(int $number) : int
    {
        return $number + 1;
    }
}
