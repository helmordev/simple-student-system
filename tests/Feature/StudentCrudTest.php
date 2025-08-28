<?php

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Create a user to act as authenticated
    $this->user = User::factory()->create();
});

it('denies access to students index when not logged in', function () {
    $response = $this->get('/students');
    $response->assertRedirect('/login');
});

it('can view the students index page', function () {
    $response = $this->actingAs($this->user)->get('/students');
    $response->assertStatus(200);
    $response->assertSee('Students');
});

it('can create a new student', function () {
    $data = [
        'name' => 'Test Student',
        'email' => 'teststudent@example.com',
        'course' => 'IT',
    ];

    $response = $this->actingAs($this->user)->post('/students', $data);

    $response->assertRedirect('/students');
    $this->assertDatabaseHas('students', ['email' => 'teststudent@example.com']);
});

it('fails to create a student without required fields', function () {
    $response = $this->actingAs($this->user)
                     ->post('/students', []); // empty data

    $response->assertSessionHasErrors(['name', 'email', 'course']);
});

it('fails to create a student with duplicate email', function () {
    $existingStudent = Student::factory()->create([
        'email' => 'duplicate@example.com'
    ]);

    $data = [
        'name' => 'New Student',
        'email' => 'duplicate@example.com', // same as existing
        'course' => 'IT',
    ];

    $response = $this->actingAs($this->user)->post('/students', $data);

    $response->assertSessionHasErrors(['email']);
});

it('can update a student', function () {
    $student = Student::factory()->create();

    $updateData = [
        'name' => 'Updated Name',
        'email' => $student->email, // keep same email to pass unique validation
        'course' => 'CS',
    ];

    $response = $this->actingAs($this->user)->put("/students/{$student->id}", $updateData);

    $response->assertRedirect('/students');
    $this->assertDatabaseHas('students', ['name' => 'Updated Name']);
});

it('can delete a student', function () {
    $student = Student::factory()->create();

    $response = $this->actingAs($this->user)->delete("/students/{$student->id}");

    $response->assertRedirect('/students');
    $this->assertDatabaseMissing('students', ['id' => $student->id]);
});
