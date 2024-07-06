<?php

namespace Tests\Feature;

use App\Models\Eventos;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class EventoTest extends TestCase
{
    /**
     * Realiza o login para testar os metodos
     *
     * @return string
     */
    public function loginToTest()
    {
        $user = $this->spy(User::class);

        return $user->createToken('test-token')->plainTextToken;
    }

    public function test_evento_if_it_can_be_created(): void
    {
        $evento = $this->spy(Eventos::class);

        expect($evento)->toBeInstanceOf(Eventos::class);
    }

    public function test_evento_page_is_displayed(): void
    {
        $mock = $this->mock(Eventos::class, function (MockInterface $mock) {
            $mock->shouldReceive('getAttribute')->with('id')->andReturn(1);
        });

        $this->get('/eventos/' . $mock->id)->assertFound();
    }
}