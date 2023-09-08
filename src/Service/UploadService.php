<?php

namespace App\Service;

use App\Exception\UploadFileInvalidTypeException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Uid\Uuid;

class UploadService implements UploadServiceInterface
{
    private const LINK_BOOK_PATTERN = '/upload/book%d/%s';

    public function __construct(private string $uploadDir)
    {
    }

    public function uploadBookFile(int $bookId, UploadedFile $file): string
    {
        $extension = $file->guessExtension();

        if (null === $extension) {
            throw new UploadFileInvalidTypeException();
        }

        $uniqueName = Uuid::v4()->toRfc4122() . '.' . $extension;
        $uploadPath = $this->uploadDir . DIRECTORY_SEPARATOR . 'book' . $bookId;

        $file->move($uploadPath, $uniqueName);

        return sprintf(self::LINK_BOOK_PATTERN, $bookId, $uniqueName);

    }

}
