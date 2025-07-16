<?php 

namespace Tests\Unit;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;

class UserControllerTest extends TestCase{
    #[Test]
    #[TestDox('Return Instance User')]
    public function returnInstanceUser(){
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }

    #[Test]
    #[TestDox('Store User')]
    public function storeUser(){
        $mock = new MockHandler([
            new Response(200,[], json_encode(['status '=> 200]))
        ]);
        $clientUser = new Client(['handler'=>HandlerStack::create($mock)]);
        $request = $clientUser->post("/user",[
            'form_params' => [
                'name'=>"Renzo",
                'last_name'=>"Medina",
                'email'=>"medinast30@mail.com",
                'password'=>"1234",
                'id_rol'=>01
                ]
            ]);

        $request->getBody();
        $this->assertEquals(200, $request->getStatusCode());
    }
}

