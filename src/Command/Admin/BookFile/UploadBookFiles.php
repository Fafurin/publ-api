<?php

namespace App\Command\Admin\BookFile;

use App\Entity\BookFile;
use App\Repository\BookOrderRepository;
use App\Service\UploadServiceInterface;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class UploadBookFiles implements UploadBookFilesInterface
{

    private const RESPONSE = 'Book files have been successfully uploaded to the server';

    public function __construct(
        private readonly BookOrderRepository    $bookOrderRepository,
        private readonly UploadServiceInterface $uploadService,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function handle(int $id, array $files): string
    {
        $book = $this->bookOrderRepository->getById($id)->getBook();

        foreach ($files as $file) {
            $link = $this->uploadService->uploadBookFile($book->getId(), $file);

            $bookFile = (new BookFile())
                ->setBook($book)
                ->setName($file->getClientOriginalName())
                ->setPath($link)
                ->setCreatedAt(new DateTimeImmutable());

            $this->em->persist($bookFile);
        }

        $this->em->flush();

        return self::RESPONSE;
    }
}
