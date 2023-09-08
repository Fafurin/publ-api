<?php

namespace App\Mapper;

use App\Entity\BookOrder;
use App\Entity\Customer;
use App\Model\Admin\BookOrder\BookOrderFullDetailsResponse;
use App\Model\Admin\Customer\CustomerResponse;

class BookOrderFullDetailsMapper implements BookOrderFullDetailsMapperInterface
{

    public function __construct(private readonly BookFullDetailsMapperInterface $bookFullDetailsMapper)
    {
    }

    public function map(BookOrder $bookOrder): BookOrderFullDetailsResponse
    {

        return (new BookOrderFullDetailsResponse())
            ->setId($bookOrder->getId())
            ->setNumber($bookOrder->getNumber())
            ->setCreatedAt($bookOrder->getCreatedAt()?->getTimestamp())
            ->setFinishedAt($bookOrder->getFinishedAt()?->getTimestamp())
            ->setDeadline($bookOrder->getDeadline())
            ->setStatus($bookOrder->getStatus()->getTitle())
            ->setCustomer($this->mapCustomer($bookOrder->getCustomer()))
            ->setBook($this->bookFullDetailsMapper->map($bookOrder->getBook()))
        ;
    }

    private function mapCustomer(Customer $customer): CustomerResponse
    {
        return (new CustomerResponse())
            ->setName($customer->getName())
            ->setPhone($customer->getPhone())
            ->setEmail($customer->getEmail());
    }

}
