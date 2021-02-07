<?php
declare(strict_types=1);

namespace DesignPatterns\Tests;

use DesignPatterns\Structural\Decorator\DoubleRoomBooking;
use DesignPatterns\Structural\Decorator\ExtraBed;
use DesignPatterns\Structural\Decorator\SingleRoomBooking;
use DesignPatterns\Structural\Decorator\WiFi;
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    public function testCanCalculatePriceForBasicDoubleRoomBooking()
    {
        $booking = new DoubleRoomBooking();

        $this->assertSame(40, $booking->calculatePrice());
        $this->assertSame('double room', $booking->getDescription());
    }


    public function testCanCalculatePriceForSingleRoomBooking()
    {
        $booking = new SingleRoomBooking();

        $this->assertSame(30, $booking->calculatePrice());
        $this->assertSame('single room', $booking->getDescription());
    }

    public function testCanCalculatePriceForSingleRoomBookingWithWifi()
    {
        $booking = new SingleRoomBooking();
        $booking = new WiFi($booking);

        $this->assertSame(32, $booking->calculatePrice());
        $this->assertSame('single room with wifi', $booking->getDescription());
    }

    public function testCanCalculatePriceForDoubleRoomBookingWithWiFi()
    {
        $booking = new DoubleRoomBooking();
        $booking = new WiFi($booking);

        $this->assertSame(42, $booking->calculatePrice());
        $this->assertSame('double room with wifi', $booking->getDescription());
    }

    public function testCanCalculatePriceForDoubleRoomBookingWithWiFiAndExtraBed()
    {
        $booking = new DoubleRoomBooking();
        $booking = new WiFi($booking);
        $booking = new ExtraBed($booking);

        $this->assertSame(72, $booking->calculatePrice());
        $this->assertSame('double room with wifi with extra bed', $booking->getDescription());
    }
}