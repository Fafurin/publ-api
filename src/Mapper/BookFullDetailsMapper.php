<?php

namespace App\Mapper;

use App\Entity\Book;
use App\Entity\BookFile;
use App\Model\Admin\Book\BookFullDetailsResponse;
use App\Model\Admin\BookFile\BookFileResponse;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class BookFullDetailsMapper implements BookFullDetailsMapperInterface
{
    public function map(Book $book): BookFullDetailsResponse
    {
        return (new BookFullDetailsResponse())
            ->setTitle($book->getTitle())
            ->setAuthors($book->getAuthors())
            ->setOrderId($book->getBookOrder()->getId())
            ->setIsbn($book->getIsbn())
            ->setCirculation($book->getCirculation())
            ->setFormat($book->getFormat()->getTitle())
            ->setType($book->getType()->getTitle())
            ->setPublicationDate($book->getPublicationDate()?->getTimestamp())
            ->setConvPrintSheets($book->getConvPrintSheets())
            ->setPublSheets($book->getPublSheets())
            ->setDescription($book->getDescription())
            ->setFiles($this->mapFiles($book->getBookFiles())->toArray())
        ;
    }

    private function mapFiles(Collection $files): ArrayCollection
    {
        return $files->map(fn (BookFile $bookFile) => (new BookFileResponse())
            ->setId($bookFile->getId())
            ->setName($bookFile->getName())
            ->setPath($bookFile->getPath())
            ->setUpdatedAt($bookFile->getCreatedAt()?->getTimestamp()));
    }

}
