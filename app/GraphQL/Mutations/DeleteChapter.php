<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Chapter;
use GraphQL\Error\Error;

final class DeleteChapter
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return array
     * @throws Error
     */
    public function __invoke($_, array $args): array
    {
        // Validate input or perform any necessary checks

        // Retrieve the chapter by ID
        $chapter = Chapter::find($args['id']);

        // Check if the chapter exists
        if (!$chapter) {
            throw new Error("Chapter not found with ID: {$args['id']}");
        }

        // Delete the chapter
        $chapter->delete();

        // Return a success message in the response
        return ['message' => "Chapter with ID {$args['id']} has been successfully deleted"];
    }
}
