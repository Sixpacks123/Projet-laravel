<?php

namespace Tests\Unit\Models;

use App\Models\Company;
use App\Models\Role;
use App\Models\Training;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test fillable attributes.
     *
     * @return void
     */
    public function test_fillable_attributes(): void
    {
        $user = new User([
            'lastname' => 'Doe',
            'firstname' => 'John',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'password' => 'password',
            'address' => '123 Main St',
            'zip_code' => '12345',
            'town' => 'Townsville',
        ]);

        $this->assertEquals('Doe', $user->lastname);
        $this->assertEquals('John', $user->firstname);
        $this->assertEquals('john@example.com', $user->email);

    }

    /**
     * Test trainingsLearners relation.
     *
     * @return void
     */
    public function test_trainings_learners_relation(): void
    {
        $user = User::factory()->create();
        $training = Training::factory()->create();
        DB::table('course_learner')->insert([
            'user_id_Learner' => $user->id,
            'training_id' => $training->id
        ]);

        $this->assertEquals(1, $user->trainingsLearners->count());
        $this->assertInstanceOf(Training::class, $user->trainingsLearners->first());
    }

    /**
     * Test trainingsTrainers relation.
     *
     * @return void
     */
    public function test_trainings_trainers_relation(): void
    {
        $user = User::factory()->create();
        Training::factory()->count(3)->create(['user_id_trainer' => $user->id]);

        $this->assertEquals(3, $user->trainingsTrainers->count());
        $this->assertInstanceOf(Training::class, $user->trainingsTrainers->first());
    }

    /**
     * Test company relation.
     *
     * @return void
     */
    public function test_company_relation(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()->create(['company_id' => $company->id]);

        $this->assertInstanceOf(Company::class, $user->company);
        $this->assertEquals($company->id, $user->company->id);
    }

    /**
     * Test roles relation.
     *
     * @return void
     */
    public function test_roles_relation(): void
    {
        $role = Role::factory()->create();
        $user = User::factory()->create(['role_id' => $role->id]);

        $this->assertInstanceOf(Role::class, $user->role);
        $this->assertEquals($role->id, $user->role->id);
    }

    /**
     * Test vehicles relation.
     *
     * @return void
     */
    public function test_vehicles_relation(): void
    {
        $user = User::factory()->create();
        Vehicle::factory()->count(3)->create(['user_id_Learner' => $user->id]);

        $this->assertEquals(3, $user->vehicles->count());
        $this->assertInstanceOf(Vehicle::class, $user->vehicles->first());
    }

}
