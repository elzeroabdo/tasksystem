<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Task; // Assuming you have a Task model
use GraphQL\Error\Error; // Use GraphQL\Error\Error for handling errors

final class DeleteTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return array
     * @throws Error
     */
    public function __invoke($_, array $args): array
    {

        // Retrieve the task by ID
        $task = Task::find($args['id']);

        // Check if the task exists
        if (!$task) {
            throw new Error("Task not found with ID: {$args['id']}");
        }

        // Delete the task
        $task->delete();

        // Return a success message in the response
        return ['message' => "Task with ID {$args['id']} has been successfully deleted"];
    }
}
