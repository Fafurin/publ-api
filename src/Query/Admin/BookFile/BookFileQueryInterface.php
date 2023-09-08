<?php

namespace App\Query\Admin\BookFile;

use App\Entity\BookFile;

interface BookFileQueryInterface
{
    public function getBookFile($id): BookFile;

}