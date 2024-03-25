<?php

namespace Tests\Feature\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $user = $this->createAdminUser($role);
        $response = $this->actingAs($user)->get(route('admin.dashboard'));
        $response->assertStatus(200);
    }

    public function testAdminUserCanDeleteNormalUserData()
    {
        $role = 0;
        $user = $this->createAdminUser($role);
        $id = $user['id'];
        $response = $this->delete(route('admin.user.delete', ['id' => $id]));
        $response->assertRedirect(route('admin.user'));
        $this->assertDatabaseMissing('users', ['id' => $id]);
        $response->assertSessionHas('alert-success');
    }
    protected function createAdminUser($role): Model
    {
        return User::factory()->createOne(['role'=>$role]);
    }

}
