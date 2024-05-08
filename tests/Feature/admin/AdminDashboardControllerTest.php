<?php

namespace Tests\Feature\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->user = null;
    }

    public function testUnauthorizedUserCannotAccessAdminDashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));

    }

    public function testAuthorizedUserCanAccessAdminDashboard(): void
    {
        $user = $this->user->createOne(['role' => 1]);
        $this->actingAs($user)->get(route('admin.dashboard'))
            ->assertOk();
    }

    public function testAdminUserCanDeleteNonAdminUserData()
    {
        // create admin user
        $adminUser = $this->user->createOne(['role' => 1]);

        // create non-admin user
        $nonAdminUser = $this->user->createOne(['role' => 0]);

        // Create history to support 'redirect()->back()' in actual controller
        $this->actingAs($adminUser)
            ->get(route('admin.user'));

        $this->actingAs($adminUser)
            ->delete(route('admin.user.delete', ['id' => $nonAdminUser['id']]))
            ->assertRedirect(route('admin.user'))
            ->assertSessionHas('alert-success');

        $this->assertDatabaseMissing('users', ['id' => $nonAdminUser['id']]);
    }

}
