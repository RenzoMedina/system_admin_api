<?php 

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserControllerTest extends TestCase{
    #[Test]
    public function returnInstanceUser(){
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
}

