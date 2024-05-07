<?php

namespace Tests\Feature\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testUnauthorizedUserCannotAccessAdminDashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));

    }

    public function testAuthorizedUserCanAccessAdminDashboard(): void
    {
        $role = 1;
        $user = $this->createUser($role);
        $response = $this->actingAs($user)->get(route('admin.dashboard'));
        $response->assertStatus(200);
    }

    public function testAdminUserCanDeleteNonAdminUserData()
    {
        // create admin user
        $adminUser = $this->createUser(1);

        // create non-admin user
        $nonAdminUser = $this->createUser(0);

        // Create history to support 'redirect()->back()' in actual controller
        $this->actingAs($adminUser)
            ->get(route('admin.user'));

        $this->actingAs($adminUser)
            ->delete(route('admin.user.delete', ['id' => $nonAdminUser['id']]))
            ->assertRedirect(route('admin.user'))
            ->assertSessionHas('alert-success');

        $this->assertDatabaseMissing('users', ['id' => $nonAdminUser['id']]);
    }

    protected function createUser($role): Model
    {
        return User::factory()->createOne(['role'=>$role]);
    }

}
