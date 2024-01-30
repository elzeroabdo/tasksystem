<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Task; // Assuming you have a Task model
use GraphQL\Error\Error; // Use GraphQL\Error\Error for handling errors

final class UpdateTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return Task
     * @throws Error
     */
    public function __invoke($_, array $args): Task
    {

        // Retrieve the task by ID
        $task = Task::find($args['id']);

        // Check if the task exists
        if (!$task) {
            throw new Error("Task not found with ID: {$args['id']}");
        }

        // Update task fields based on the input data
        $task->task = $args['input']['task']; // Assuming 'task' is the field in the input
        $task->status = $args['input']['status']; // Assuming 'status' is the field in the input
        $task->chapter_id = $args['input']['chapter_id']; // Assuming 'chapter_id' is the field in the input
        // If you want to update the user_id, you might do something similar to the chapter_id above.
        $task->user_id = $args['input']['user_id']; // Assuming 'user_id' is the field in the input

        // Save the updated task to the database
        $task->save();

        return $task;
    }
}
