<?php

namespace KHerGe\Providence\Exception;

/**
 * An exception that is thrown if a value is not a class instance.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class NotClassInstanceException extends Exception
{
    /**
     * The value.
     *
     * @var mixed
     */
    private $value;

    /**
     * Initializes the new exception.
     *
     * @param mixed $value The invalid value.
     */
    public function __construct($value)
    {
        parent::__construct(
            sprintf(
                'The %s value is not a class instance.',
                gettype($value)
            )
        );

        $this->value = $value;
    }
}
