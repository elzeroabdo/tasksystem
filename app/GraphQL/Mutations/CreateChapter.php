<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Chapter; // Assuming you have a Chapter model

final class CreateChapter
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return Chapter
     */
    public function __invoke($_, array $args): Chapter
    {
        // Validate input or perform any necessary checks

        // Create a new chapter
        $chapter = new Chapter();
        $chapter->chapter = $args['input']['chapter']; // Assuming 'chapter' is the field in the input

        // Save the chapter to the database
        $chapter->save();

        return $chapter;
    }
}
