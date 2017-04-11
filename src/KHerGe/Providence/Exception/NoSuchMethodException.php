<?php

namespace KHerGe\Providence\Exception;

/**
 * An exception that is thrown if a method does not exist for a class instance.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class NoSuchMethodException extends Exception
{
    /**
     * The class instance.
     *
     * @var object
     */
    private $instance;

    /**
     * The name of the method.
     *
     * @var string
     */
    private $method;

    /**
     * Initializes the new exception.
     *
     * @param object $instance The class instance.
     * @param string $method   The name of the method.
     */
    public function __construct($instance, string $method)
    {
        parent:: __construct(
            sprintf(
                'The method "%s" does not exist for "%s".',
                $method,
                get_class($instance)
            )
        );

        $this->instance = $instance;
        $this->method = $method;
    }

    /**
     * Returns the class instance.
     *
     * @return object The class instance.
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * Returns the name of the method.
     *
     * @return string The name.
     */
    public function getMethod() : string
    {
        return $this->method;
    }
}
