<?php

namespace KHerGe\Providence;

use KHerGe\Providence\Exception\NoSuchMethodException;
use KHerGe\Providence\Exception\NoSuchPropertyException;
use KHerGe\Providence\Exception\NotClassInstanceException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

/**
 * Exposes all protected and private members of a class instance.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Eye
{
    /**
     * The inner class instance.
     *
     * @var object
     */
    private $instance;

    /**
     * Initializes the new eye of providence.
     *
     * @param object $instance The class instance.
     *
     * @throws NotClassInstanceException If the value is not valid.
     */
    public function __construct($instance)
    {
        if (!is_object($instance)) {
            throw new NotClassInstanceException($instance);
        }

        $this->instance = $instance;
    }

    /**
     * Invokes a class method and returns its value.
     *
     * @param string $name      The name of the method.
     * @param array  $arguments The method arguments.
     *
     * @return mixed The result of the method.
     */
    public function __call(string $name, array $arguments)
    {
        return $this
            ->findMethod($name)
            ->invokeArgs($this->instance, $arguments)
        ;
    }

    /**
     * Returns the value of a property.
     *
     * @param string $name The name of the property.
     *
     * @return mixed The value of the property.
     */
    public function __get(string $name)
    {
        return $this
            ->findProperty($name)
            ->getValue($this->instance)
        ;
    }

    /**
     * Sets the value of an property.
     *
     * @param string $name  The name of the property.
     * @param mixed  $value The value of the property.
     */
    public function __set(string $name, $value)
    {
        $this
            ->findProperty($name)
            ->setValue($this->instance, $value)
        ;
    }

    /**
     * Finds a method for the class instance.
     *
     * @param string $name The name of the method.
     *
     * @return ReflectionMethod The method reflection.
     *
     * @throws NoSuchMethodException If the method does not exist.
     */
    private function findMethod(string $name) : ReflectionMethod
    {
        $reflection = new ReflectionClass($this->instance);

        while (!$reflection->hasMethod($name)) {
            if (!$reflection->getParentClass()) {
                throw new NoSuchMethodException($this->instance, $name);
            }

            $reflection = $reflection->getParentClass();
        }

        $reflection = $reflection->getMethod($name);
        $reflection->setAccessible(true);

        return $reflection;
    }

    /**
     * Finds a property for the class instance.
     *
     * @param string $name The name of the property.
     *
     * @return ReflectionProperty The property reflection.
     *
     * @throws NoSuchPropertyException If the property does not exist.
     */
    private function findProperty(string $name) : ReflectionProperty
    {
        $reflection = new ReflectionClass($this->instance);

        while (!$reflection->hasProperty($name)) {
            if (!$reflection->getParentClass()) {
                throw new NoSuchPropertyException($this->instance, $name);
            }

            $reflection = $reflection->getParentClass();
        }

        $reflection = $reflection->getProperty($name);
        $reflection->setAccessible(true);

        return $reflection;
    }
}
