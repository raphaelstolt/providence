<?php

namespace KHerGe\Providence\Exception;

/**
 * An exception that is thrown if a property does not exist for a class instance.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class NoSuchPropertyException extends Exception
{
    /**
     * The class instance.
     *
     * @var object
     */
    private $instance;

    /**
     * The name of the property.
     *
     * @var string
     */
    private $property;

    /**
     * Initializes the new exception.
     *
     * @param object $instance The class instance.
     * @param string $property   The name of the property.
     */
    public function __construct($instance, string $property)
    {
        parent:: __construct(
            sprintf(
                'The property "%s" does not exist for "%s".',
                $property,
                get_class($instance)
            )
        );

        $this->instance = $instance;
        $this->property = $property;
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
     * Returns the name of the property.
     *
     * @return string The name.
     */
    public function getProperty() : string
    {
        return $this->property;
    }
}
