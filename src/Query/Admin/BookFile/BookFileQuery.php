<?php

namespace App\Query\Admin\BookFile;

use App\Entity\BookFile;
use App\Repository\BookFileRepository;

class BookFileQuery implements BookFileQueryInterface
{
    public function __construct(private readonly BookFileRepository $bookFileRepository)
    {
    }

    public function getBookFile($id): BookFile
    {
        return $this->bookFileRepository->find($id);

    }

}
