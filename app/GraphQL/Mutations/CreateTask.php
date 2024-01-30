<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

final class CreateTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return Task|null
     */
    public function __invoke($_, array $args): ?Task
    {
        // Check if the user is authenticated
        if (!$user = auth()->user()) {
            // Handle unauthenticated user (throw an error or return null)
            throw new \Error('User is not authenticated.');
        }

        // Create a new task
        $task = new Task();
        $task->task = $args['input']['task'] ?? null; // Adjust accordingly
        $task->status = $args['input']['status'] ?? null; // Adjust accordingly
        $task->chapter_id = $args['input']['chapter_id'] ?? null; // Adjust accordingly
        $task->user_id = $user->id; // Set the user ID

        // Save the task to the database
        $task->save();

        return $task;
    }
}
