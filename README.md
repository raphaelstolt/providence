Eye of Providence
=================

Makes testing through reflection easy.

This library will simply provide a decorator class around any other class
instance. The decorator class will provide access to all private and protected
class properties and methods.

Requirements
------------

- PHP 7.1+

Installing
-----------

    composer require kherge/providence

Usage
-----

```php
use KHerGe\Providence\Eye;

/**
 * An example class with private members.
 */
class Example
{
    private $property = 'The property value.';
    
    private function method()
    {
        echo "The method.\n";
    }
}

// Create an instance of the class.
$example = new Example();

// Create a instance of the decorator.
$eye = new Eye($example);

// Access members as if they were public!
echo $eye->property, "\n";

$eye->method();
```
