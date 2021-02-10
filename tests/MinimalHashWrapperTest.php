<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MinimalHashWrapperTest extends TestCase
{
    public function testHashCreating() : void {
        $randomPassword = 'Hello World' . time();
        $hash = \basteyy\MinimalHashWrapper\MinimalHashWrapper::getHash($randomPassword);
        $this->assertIsString($hash);
    }

    public function testHashVerifing() : void {
        $randomPassword = 'Hello World' . time();
        $hash = \basteyy\MinimalHashWrapper\MinimalHashWrapper::getHash($randomPassword);
        $this->assertTrue(\basteyy\MinimalHashWrapper\MinimalHashWrapper::compare($randomPassword, $hash));
    }

    public function testHashVerifingWrongPassword() : void {
        $hash = \basteyy\MinimalHashWrapper\MinimalHashWrapper::getHash('Hello World' . time());
        $this->assertFalse(\basteyy\MinimalHashWrapper\MinimalHashWrapper::compare('H€llo World' . time(), $hash));
    }

    public function testCanChangeCost() : void {
        $randomNewCost = 8;
        \basteyy\MinimalHashWrapper\MinimalHashWrapper::setCryptCost($randomNewCost);
        $this->assertEquals($randomNewCost, \basteyy\MinimalHashWrapper\MinimalHashWrapper::getCost());
    }

    public function testCanChangeAlgo() : void {
        \basteyy\MinimalHashWrapper\MinimalHashWrapper::setAlgorithm(PASSWORD_ARGON2I);
        $this->assertEquals(PASSWORD_ARGON2I, \basteyy\MinimalHashWrapper\MinimalHashWrapper::getAlgorithm());
    }
}