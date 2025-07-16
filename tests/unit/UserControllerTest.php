<?php 

namespace Tests\Unit;

use App\Models\User;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserControllerTest extends TestCase{

    #[Test]
    public function returnInstanceUser(){
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
    #[Test]
    public function storeUser(){
        $clientUser = new Client([
            'base_uri' => 'http://localhost:8080/api/v1',
            'timeout'  => 2.0,
        ]);
        $request = $clientUser->post("/user",[
            'form_params' => [
                'name'=>"Renzo",
                'last_name'=>"Medina",
                'email'=>"medinast30@mail.com",
                'password'=>"1234",
                'id_rol'=>01
                ]
            ]);

        $body = $request->getBody();
        $data  = json_decode($body, true);
        $this->assertEquals(200, $request->getStatusCode());
    }
}

