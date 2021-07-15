<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStatusTest extends TestCase
{
    use RefreshDatabase;

    /**
       @test
     */
    public function un_usuario_autenticado_puede_crear_estado()
    {
    
        $this->withoutExceptionHandling();
        //given => teniendo un usuario auntenticado
        $user = factory(User::class)->create();
        $this->actingAs($user);
         
        //when => cuando hace un post request a status

        $this->post(route('statuses.store'), ['body' =>'Mi primer status']);
        //then => entonces vemos un nuevo estado en la base de datos

        $this->assertDatabaseHas('status', [
            'body' => 'Mi primer status'
        ]);
    }
}
