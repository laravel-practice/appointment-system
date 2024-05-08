<?php

namespace Tests\Feature\Frontend;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testPageIsAccessible()
    {
        $this->get('/')
            ->assertSee('Login to Make Appointment')
            ->assertStatus(200);
    }

    public function testUnAuthenticationUserCannotMakeAppointment()
    {
        $formData = [
            'title' => 'aa',
            'appointment_date' => '2024-05-07',
            'appointment_time' => '12:00',
            'description' => 'this is testing data',
        ];

        $this->post(route('appointment'), $formData)
            ->assertStatus(302) // Assuming redirect on failed authentication
            ->assertSessionHas('error');
    }

    // Test validation errors
    public function testMissingRequiredFields()
    {
        $formData = [
            'title' => '',
            'appointment_date' => '',
            'appointment_time' => '12:00',
            'description' => 'this is testing data',
        ];

        // user login
        $user = User::factory()->createOne(['role'=>0]);
        $this->actingAs($user);

        // send form with missing field
        $this->post(route('appointment'), $formData)
            ->assertSessionHasErrors(['title', 'appointment_date']);

        $formData['title'] ='cool bean';
        $formData['appointment_date'] = 'abc';
        $res = $this->post(route('appointment'), $formData)
            ->assertSessionHasErrors(['appointment_date' => 'The appointment date is not a valid date.']);
    }

    // Test newly added record exists in database
    public function testLoggedInUserCanCreateAppointment()
    {
        // user login
        $user = User::factory()->createOne(['role'=>0]);
        $this->actingAs($user);

        $formData = [
            'title' => 'hello appointment',
            'appointment_date' => '2024-09-09',
            'appointment_time' => '12:00',
            'description' => 'this is testing data',
        ];

        $this->post(route('appointment'), $formData)
            ->assertSessionHas('alert-success');
        $this->assertDatabaseHas('appointments', ['user_id' => $user['id']]);
    }
}
