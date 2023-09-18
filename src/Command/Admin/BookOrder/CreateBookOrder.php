<?php

namespace App\Command\Admin\BookOrder;

use App\Entity\Book;
use App\Entity\BookOrder;
use App\Entity\Customer;
use App\Entity\Status;
use App\Model\Admin\BookOrder\BookOrderBriefDetailsRequest;
use App\Repository\BookFormatRepository;
use App\Repository\BookTypeRepository;
use App\Repository\CustomerRepository;
use App\Repository\StatusRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreateBookOrder implements CreateBookOrderInterface
{
    private const STATUS = 'Standing by';

    public function __construct(
        private readonly CustomerRepository $customerRepository,
        private readonly BookFormatRepository $bookFormatRepository,
        private readonly BookTypeRepository $bookTypeRepository,
        private readonly StatusRepository $statusRepository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function handle(BookOrderBriefDetailsRequest $request): int
    {
        $customer = new Customer();
        if (!$this->customerRepository->existsByEmail($request->getCustomerEmail())) {
            $customer->setName($request->getCustomerName())
                ->setEmail($request->getCustomerEmail())
                ->setPhone($request->getCustomerPhone());
        } else {
            $customer = $this->customerRepository->findByEmail($request->getCustomerEmail());
        }

        $this->em->persist($customer);

        $book = (new Book())
            ->setTitle($request->getBookTitle())
            ->setAuthors([$request->getAuthors()])
            ->setDescription($request->getDescription())
            ->setType($this->bookTypeRepository->find($request->getBookTypeId()))
            ->setFormat($this->bookFormatRepository->find($request->getBookFormatId()));

        $this->em->persist($book);

        $bookOrder = (new BookOrder())
            ->setCustomer($customer)
            ->setBook($book)
            ->setStatus($this->setStatusPrePersist())
            ->setDeadline($request->getDeadline());

        $this->em->persist($bookOrder);

        $book->setBookOrder($bookOrder);

        $this->em->flush();

        return $bookOrder->getId();
    }

    private function setStatusPrePersist(): Status
    {
        if (null !== $this->statusRepository->findByTitle(self::STATUS)) {
            $status = $this->statusRepository->findByTitle(self::STATUS);
        } else {
            $status = (new Status())->setTitle(self::STATUS);
            $this->em->persist($status);
            $this->em->flush();
        }

        return $status;
    }
}
