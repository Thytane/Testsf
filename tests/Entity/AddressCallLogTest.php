<?php

namespace App\Tests\Entity;

use App\Entity\AddressCallLog;
use PHPUnit\Framework\TestCase;

class AddressCallLogTest extends TestCase
{

  public function testCreate()
  {
    $apiLog = new AddressCallLog();
    $apiLog->setSearch('PHP UNIT TEST');
    $apiLog->setDate(new \DateTime('NOW'));
    $apiLog->setIP('0.0.0.0');


    $this->assertEquals("PHP UNIT TEST", $apiLog->getSearch());
    $this->assertEquals("0.0.0.0", $apiLog->getIP());
  }
}