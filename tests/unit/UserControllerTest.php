<?php 

namespace Tests\Unit;

use App\Controllers\UserController;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserControllerTest extends TestCase{
    #[Test]
    public function returnMethodIndex(){
        $user = new UserController();

        $retorno = $user->index();

        $this->assertEquals("Hola", $retorno);
    }
}