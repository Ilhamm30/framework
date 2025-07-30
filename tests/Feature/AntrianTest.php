<?php

namespace Tests\Feature;

use App\Models\Antrian;
use App\Models\Barber;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AntrianTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_antrian()
    {
        // Create user and barber
        $user = User::factory()->create(['role' => 'pelanggan']);
        $barber = Barber::create([
            'name' => 'Test Barber',
            'specialty' => 'Test Specialty',
            'bio' => 'Test Bio',
            'status' => 'aktif'
        ]);

        // Test creating antrian
        $antrian = Antrian::create([
            'user_id' => $user->id,
            'barber_id' => $barber->id,
            'nomor_antrian' => 1,
            'status' => 'menunggu'
        ]);

        $this->assertDatabaseHas('antrians', [
            'id' => $antrian->id,
            'user_id' => $user->id,
            'barber_id' => $barber->id,
            'nomor_antrian' => 1,
            'status' => 'menunggu'
        ]);

        // Test relationships
        $this->assertEquals($user->id, $antrian->user->id);
        $this->assertEquals($barber->id, $antrian->barber->id);
    }

    public function test_antrian_has_correct_status_text()
    {
        $user = User::factory()->create(['role' => 'pelanggan']);
        $barber = Barber::create([
            'name' => 'Test Barber',
            'specialty' => 'Test Specialty',
            'bio' => 'Test Bio',
            'status' => 'aktif'
        ]);

        $antrian = Antrian::create([
            'user_id' => $user->id,
            'barber_id' => $barber->id,
            'nomor_antrian' => 1,
            'status' => 'menunggu'
        ]);

        $this->assertEquals('Menunggu', $antrian->status_text);
        $this->assertEquals('bg-yellow-100 text-yellow-800', $antrian->status_color);
    }

    public function test_can_submit_antrian_form_when_authenticated()
    {
        $user = User::factory()->create(['role' => 'pelanggan']);
        $barber = Barber::create([
            'name' => 'Test Barber',
            'specialty' => 'Test Specialty',
            'bio' => 'Test Bio',
            'status' => 'aktif'
        ]);

        $response = $this->actingAs($user)->post('/antrian/ambil', [
            'barber_id' => $barber->id
        ]);

        $response->assertRedirect('/antrian');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('antrians', [
            'user_id' => $user->id,
            'barber_id' => $barber->id,
            'status' => 'menunggu'
        ]);
    }

    public function test_cannot_submit_antrian_form_when_not_authenticated()
    {
        $barber = Barber::create([
            'name' => 'Test Barber',
            'specialty' => 'Test Specialty',
            'bio' => 'Test Bio',
            'status' => 'aktif'
        ]);

        $response = $this->post('/antrian/ambil', [
            'barber_id' => $barber->id
        ]);

        $response->assertRedirect('/login');
    }

    public function test_cannot_submit_antrian_without_barber_id()
    {
        $user = User::factory()->create(['role' => 'pelanggan']);

        $response = $this->actingAs($user)->post('/antrian/ambil', []);

        $response->assertSessionHasErrors(['barber_id']);
    }
}
