<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Chapter; // Assuming you have a Chapter model
use GraphQL\Error\Error; // Use GraphQL\Error\Error for handling errors

final class UpdateChapter
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return Chapter
     * @throws Error
     */
    public function __invoke($_, array $args): Chapter
    {
        // Validate input or perform any necessary checks

        // Retrieve the chapter by ID
        $chapter = Chapter::find($args['id']);

        // Check if the chapter exists
        if (!$chapter) {
            throw new Error("Chapter not found with ID: {$args['id']}");
        }

        // Update chapter fields based on the input data
        $chapter->chapter = $args['input']['chapter']; // Assuming 'chapter' is the field in the input

        // Save the updated chapter to the database
        $chapter->save();

        return $chapter;
    }
}
