<?php

namespace App\Command\Admin\BookFile;

interface UploadBookFilesInterface
{
    public function handle(int $id, array $files): string;

}
