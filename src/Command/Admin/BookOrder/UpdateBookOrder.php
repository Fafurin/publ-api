<?php

namespace App\Command\Admin\BookOrder;

use App\Entity\Book;
use App\Entity\BookOrder;
use App\Entity\Customer;
use App\Entity\Status;
use App\Exception\BookOrderNotFoundException;
use App\Model\Admin\BookOrder\BookOrderBriefDetailsRequest;
use App\Model\Admin\BookOrder\BookOrderFullDetailsRequest;
use App\Repository\BookFormatRepository;
use App\Repository\BookOrderRepository;
use App\Repository\BookTypeRepository;
use App\Repository\CustomerRepository;
use App\Repository\StatusRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class UpdateBookOrder implements UpdateBookOrderInterface
{

    public function __construct(
        private readonly BookOrderRepository    $bookOrderRepository,
        private readonly BookFormatRepository   $bookFormatRepository,
        private readonly BookTypeRepository     $bookTypeRepository,
        private readonly StatusRepository       $statusRepository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function handle(BookOrderFullDetailsRequest $request, int $id): void
    {
        if (!$this->bookOrderRepository->existsById($id)) {
            throw new BookOrderNotFoundException();
        }

        $bookOrder = $this->bookOrderRepository->find($id);

        $customer = $bookOrder->getCustomer()
            ->setName($request->getName())
            ->setEmail($request->getEmail())
            ->setPhone($request->getPhone());

        $this->em->persist($customer);

        $publicationDate = null;

        if ($request->getPublicationDate() !== null) {
            $publicationDate = DateTimeImmutable::createFromFormat('Y-m-d', $request->getPublicationDate());
        }

        $book = $bookOrder->getBook()
            ->setTitle($request->getTitle())
            ->setAuthors($request->getAuthors())
            ->setCirculation($request->getCirculation())
            ->setIsbn($request->getIsbn())
            ->setFormat($this->bookFormatRepository->findByTitle($request->getFormat()))
            ->setType($this->bookTypeRepository->findByTitle($request->getType()))
            ->setPublicationDate($publicationDate)
            ->setDescription($request->getDescription())
            ->setPublSheets($request->getPublSheets())
            ->setConvPrintSheets($request->getConvPrintSheets());

        $this->em->persist($book);

        $createdAt = null;
        if ($request->getCreatedAt() != null) {
            $createdAt = DateTimeImmutable::createFromFormat('Y-m-d', $request->getCreatedAt());
        }

        $finishedAt = null;
        if ($request->getFinishedAt() != null) {
            $finishedAt = DateTimeImmutable::createFromFormat('Y-m-d', $request->getFinishedAt());
        }

        $bookOrder
            ->setNumber($request->getNumber())
            ->setCreatedAt($createdAt)
            ->setUpdatedAt(new DateTimeImmutable())
            ->setFinishedAt($finishedAt)
            ->setDeadline($request->getDeadline())
            ->setStatus($this->statusRepository->findByTitle($request->getStatus()))
            ->setCustomer($customer)
            ->setBook($book);

        $this->em->persist($bookOrder);

        $this->em->flush();
    }

}
