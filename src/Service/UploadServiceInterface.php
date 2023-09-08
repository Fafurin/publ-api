<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface UploadServiceInterface
{
    public function uploadBookFile(int $bookId, UploadedFile $file): string;

}