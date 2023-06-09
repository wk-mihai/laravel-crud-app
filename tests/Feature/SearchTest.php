<?php

namespace Tests\Feature;

use App\Models\Training;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function is_having_search_results()
    {
        [$type, $user] = $this->createTypeAttachedToRole();

        $search = 'Test Training';
        $expectedName = 'Test Training Name';

        Training::factory()->create([
            'name'    => $expectedName,
            'type_id' => $type->id
        ]);

        $this->actingAs($user)
            ->get(route('trainings.index', ['search' => $search]))
            ->assertViewIs('pages.trainings.index')
            ->assertSee($type->name)
            ->assertSee($expectedName);
    }

    /** @test */
    public function is_not_having_search_results()
    {
        [$type, $user] = $this->createTypeAttachedToRole();

        $search = 'Test Training';
        $expectedName = 'Test Training Name';

        Training::factory()->create([
            'type_id' => $type->id
        ]);

        $this->actingAs($user)
            ->get(route('trainings.index', ['search' => $search]))
            ->assertViewIs('pages.trainings.index')
            ->assertDontSee($type->name)
            ->assertDontSee($expectedName)
            ->assertSee(__('app.there_are_currently_no_records'));
    }
}
