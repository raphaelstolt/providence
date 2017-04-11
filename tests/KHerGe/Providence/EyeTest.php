<?php

namespace KHerGe\Providence;

use KHerGe\Providence\Exception\NotClassInstanceException;
use KHerGe\Providence\Test\Test;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Verifies that the eye of providence functions as intended.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 *
 * @coversDefaultClass \KHerGe\Providence\Eye
 *
 * @covers ::__construct
 */
class EyeTest extends TestCase
{
    /**
     * The `Test` wrapper.
     *
     * @var Eye|Test
     */
    private $test;

    /**
     * Verify that an exception is thrown for an invalid class instance.
     *
     * @covers ::__construct
     */
    public function testAnInvalidClassInstanceThrowsAnException()
    {
        $this->expectException(NotClassInstanceException::class);

        new Eye(true);
    }

    /**
     * Verify that a base class method can be invoked.
     *
     * @covers ::__call
     * @covers ::findMethod
     */
    public function testInvokeABaseClassMethod()
    {
        self::assertEquals(
            4,
            $this->test->abstractMethod(3),
            'The base class method was not invoked.'
        );
    }

    /**
     * Verify that a method can be invoked.
     *
     * @covers ::__call
     * @covers ::findMethod
     */
    public function testInvokeAMethod()
    {
        self::assertEquals(
            8,
            $this->test->testMethod(4),
            'The method was not invoked.'
        );
    }

    /**
     * Verify that a base class property can be retrieved.
     *
     * @covers ::__get
     * @covers ::findProperty
     */
    public function testGetABaseClassProperty()
    {
        self::assertEquals(
            'The abstract value.',
            $this->test->abstractProperty,
            'The base class property was not returned.'
        );
    }

    /**
     * Verify that a class property can be retrieved.
     *
     * @covers ::__get
     * @covers ::findProperty
     */
    public function testGetAClassProperty()
    {
        self::assertEquals(
            'The test value.',
            $this->test->testProperty,
            'The class property was not returned.'
        );
    }

    /**
     * @depends testGetABaseClassProperty
     *
     * Verify that a base class property can be set.
     *
     * @covers ::__set
     * @covers ::findProperty
     */
    public function testSetABaseClassProperty()
    {
        $this->test->abstractProperty = 'test';

        self::assertEquals(
            'test',
            $this->test->abstractProperty,
            'The base class property was not set.'
        );
    }

    /**
     * @depends testGetAClassProperty
     *
     * Verify that a class property can be set.
     *
     * @covers ::__set
     * @covers ::findProperty
     */
    public function testSetAClassProperty()
    {
        $this->test->testProperty = 'test';

        self::assertEquals(
            'test',
            $this->test->testProperty,
            'The class property was not set.'
        );
    }

    /**
     * Creates a new wrapper for a `Test` object.
     */
    protected function setUp()
    {
        $this->test = new Eye(new Test());
    }
}
