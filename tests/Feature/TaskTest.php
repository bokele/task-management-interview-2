<?php

use App\Livewire\Forms\ProjectForm;
use App\Livewire\Task\Create;
use App\Livewire\Task\Edit;
use App\Livewire\Task\Index;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Livewire\Livewire;

test('index task screen can be rendered with the Index Component', function () {
    $this->actingAs($user = User::factory()->create());

    $response = $this->get('/tasks');
    $response->assertSeeLivewire(Index::class);
    $response->assertStatus(200);
});

test('create task screen can be rendered with the create component', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $projects = Project::factory(['user_id' => $user->id])->count(10)->create();
    $response = $this->get('/tasks/create');
    $response->assertSeeLivewire(Create::class, ['projects' => $projects]);
    $response->assertStatus(200);
});

test('edit project screen can be rendered with the edit component', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $project = Project::factory(['user_id' => $user->id])->create();
    $task = Task::factory(['user_id' => $user->id, 'project_id' => $project->id])->create();

    $response = $this->get('/tasks/' . $task->id . '/edit');
    $response->assertSeeLivewire(Edit::class, ['project' => $project]);
    $response->assertStatus(200);
});


// test('all field are required', function () {
//     $user = User::factory()->create();

//     Livewire::actingAs($user)
//         ->test(Create::class)
//         ->set('form.name', '')
//         ->set('form.project_name', '')
//         ->assertHasErrors('form.name')
//         ->assertHasErrors('form.project_name');
// });

test('redirected to all task after creating a task', function () {
    $this->actingAs($user = User::factory()->create());
    $this->assertEquals(0, Task::count());

    Livewire::test(Create::class)
        ->set('form.name', 'New Task')
        ->set('form.project_name', 1)
        ->call('save')
        ->assertRedirect('/tasks');

    $this->assertEquals(1, Task::count());
});

test('redirected to all task after Editing a task', function () {
    $user = User::factory()->create();
    $project = Project::factory(['user_id' => $user->id])->create();
    $task = Task::factory(['user_id' => $user->id, 'project_id' => $project->id])->create();

    Livewire::actingAs($user)
        ->test(Edit::class, ['task' => $task])
        ->set('form.name', 'New Task')
        ->set('form.project_name', 1)
        ->call('save')
        ->assertRedirect('/tasks');
});

test('cannot Edit  someone task', function () {
    $user = User::factory()->create();
    $stranger = User::factory()->create();
    $project = Project::factory(['user_id' => $user->id])->create();
    $task = Task::factory(['project_id' => $project->id])->for($stranger)->create();

    Livewire::actingAs($user)
        ->test(Edit::class, ['task' => $task])
        ->set('form.name', 'New Task')
        ->set('form.project_name', 1)
        ->call('save')
        ->assertUnauthorized();
});

test('can delete project', function () {
    $user = User::factory()->create();
    $task = Task::factory()->for($user)->create();

    Livewire::actingAs($user)
        ->test(Index::class)
        ->call('delete', $task->id)
        ->assertStatus(200);
});

test('cannot delete  someone project', function () {
    $user = User::factory()->create();
    $stranger = User::factory()->create();
    $task = Task::factory()->for($stranger)->create();

    Livewire::actingAs($user)
        ->test(Index::class)
        ->call('delete', $task->id)
        ->assertUnauthorized();
});
