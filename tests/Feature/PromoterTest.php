<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PromoterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Realiza o login para testar os metodos
     *
     * @return string
     */
    private function loginToTest()
    {
        $user = User::factory()->create();

        return $user->createToken('test-token')->plainTextToken;
    }

    public function test_promoter_page_is_displayed(): void
    {
        $promoter = User::factory()->create();

        $response = $this
            ->actingAs($promoter)
            ->get('/promoter/'.$promoter->id);

        $response->assertOk();
    }

    public function test_promoter_can_be_updated(): void
    {
        $promoter = User::factory()->create();

        $this
        ->actingAs($promoter)
        ->patch('/promoter/edit', [
            'id' => $promoter->id,
            'name' => 'Test User',
            'level' => 4,
            'is_goalkeeper' => true,
            'email' => 'test@example.com',
        ]);

        $promoter->refresh();

        $this->assertSame('Test User', $promoter->name);
    }
}