<?php

namespace Tests\Feature\Roles;

use App\Models\Role;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string */
    protected string $roleName = 'Role name';

    /**
     * @return Role
     */
    protected function getAdminRole(): Role
    {
        static $role;

        if ($role === null) {
            $role = Role::firstWhere('slug', 'admin');
        }

        return $role;
    }

    /**
     * @param array $data
     * @return TestResponse
     */
    protected function store(array $data = []): TestResponse
    {
        static $admin;

        if ($admin === null) {
            $admin = $this->createAdministrator();
        }

        return $this
            ->actingAs($admin)
            ->post(route('admin.roles.store'), $data);
    }

    /**
     * @param Role $record
     * @param array $data
     * @return TestResponse
     */
    protected function update(Role $record, array $data = []): TestResponse
    {
        static $admin;

        if ($admin === null) {
            $admin = $this->createAdministrator();
        }

        return $this
            ->actingAs($admin)
            ->patch(route('admin.roles.update', $record), $data);
    }

    /** @test */
    public function is_requires_all_fields_on_store()
    {
        $this->store()->assertSessionHasErrors(['name', 'slug', 'types']);
    }

    /** @test */
    public function is_requires_all_fields_on_update()
    {
        $role = Role::factory()->create();

        $this->update($role)->assertSessionHasErrors(['name', 'slug', 'types']);
    }

    /** @test */
    public function is_requires_string_name()
    {
        $this->store(['name' => [$this->roleName]])
            ->assertSessionHasErrors(['name']);

        $role = Role::factory()->create();

        $this->update($role, ['name' => [$this->roleName]])
            ->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function is_requires_string_slug()
    {
        $this->store(['slug' => [$this->roleName]])
            ->assertSessionHasErrors(['slug']);

        $role = Role::factory()->create();

        $this->update($role, ['slug' => [$this->roleName]])
            ->assertSessionHasErrors(['slug']);
    }

    /** @test */
    public function is_requires_array_types()
    {
        $this->store(['types' => 'string'])
            ->assertSessionHasErrors(['types']);

        $role = Role::factory()->create();

        $this->update($role, ['types' => 'string'])
            ->assertSessionHasErrors(['types']);
    }

    /** @test */
    public function is_requires_unique_slug_on_store()
    {
        $slug = 'test-role';

        Role::factory()->create([
            'slug' => $slug
        ]);

        $this->store(['slug' => $slug, 'name' => $this->roleName])
            ->assertSessionDoesntHaveErrors(['name'])
            ->assertSessionHasErrors(['slug']);
    }

    /** @test */
    public function is_requires_unique_slug_on_update()
    {
        $slug = 'test-role';

        Role::factory()->create([
            'slug' => $slug
        ]);

        $role = Role::factory()->create();

        $this->update($role, ['slug' => $slug, 'name' => $this->roleName])
            ->assertSessionDoesntHaveErrors(['name'])
            ->assertSessionHasErrors(['slug']);
    }

    /** @test */
    public function is_requires_exits_types()
    {
        $this->store(['types' => [-1]])
            ->assertSessionHasErrors(['types']);

        $role = Role::factory()->create();

        $this->update($role, ['types' => [-1]])
            ->assertSessionHasErrors(['types']);
    }

    /** @test */
    public function is_not_requires_types_for_admin_role_on_update()
    {
        $role = $this->getAdminRole();

        $this->update($role)
            ->assertSessionDoesntHaveErrors(['types']);
    }

    /** @test */
    public function is_requires_name_and_slug_to_have_admissible_length()
    {
        $name = resolve(Faker::class)->words(100, true);
        $slug = Str::slug($name);

        $this->store([
            'name' => $name,
            'slug' => $slug
        ])->assertSessionHasErrors(['name', 'slug']);

        $this->update(
            Role::factory()->create(),
            [
                'name' => $name,
                'slug' => $slug
            ]
        )->assertSessionHasErrors(['name', 'slug']);
    }
}
