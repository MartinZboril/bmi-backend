<?php

namespace Tests\Feature;

use App\Enums\SexEnum;
use App\Models\BodyMassIndex;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BodyMassIndexTest extends TestCase
{
    use RefreshDatabase;
 
    public function test_user_can_get_to_bmis()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->getJson('/api/v1/body-mass-index');
 
        $response->assertStatus(200);
    }

    public function test_user_can_add_bmi()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->postJson('/api/v1/body-mass-index', [
            'sex' => SexEnum::Male->value,
            'age' => 24,
            'height' => 185,
            'weight' => 78,
            'note' => 'Note test',
        ]);
 
        $response->assertSuccessful();
        $response->assertJsonFragment(['index' => 22.79035792549306]);
    }

    public function test_user_can_get_to_bmi()
    {
        $user = User::factory()->create();
        $bodyMassIndex = BodyMassIndex::factory()->create();

        $response = $this->actingAs($user)->getJson('/api/v1/body-mass-index/'.$bodyMassIndex->id);
 
        $response->assertStatus(200);
    }

    public function test_user_can_edit_bmi()
    {
        $user = User::factory()->create();
        $bodyMassIndex = BodyMassIndex::factory()->create(['height' => 185]);

        $response = $this->actingAs($user)->putJson('/api/v1/body-mass-index/'.$bodyMassIndex->id, [
            'sex' => $bodyMassIndex->sex,
            'age' => $bodyMassIndex->age,
            'height' => $bodyMassIndex->height,
            'weight' => 81,
            'note' => null,
        ]);
 
        $response->assertSuccessful();
        $response->assertJsonFragment(['weight' => 81]);
        $response->assertJsonFragment(['index' => 23.66691015339664]);
        $response->assertJsonFragment(['note' => null]);
    }

    public function test_user_can_destroy_bmi()
    {
        $user = User::factory()->create();
        $bodyMassIndex = BodyMassIndex::factory()->create(['height' => 185]);

        $response = $this->actingAs($user)->deleteJson('/api/v1/body-mass-index/'.$bodyMassIndex->id);
 
        $response->assertNoContent();
 
        $this->assertDatabaseMissing('body_mass_indices', [
            'id' => $bodyMassIndex->id,
            'deleted_at' => NULL
        ])->assertDatabaseCount('body_mass_indices', 1);
    }
}
