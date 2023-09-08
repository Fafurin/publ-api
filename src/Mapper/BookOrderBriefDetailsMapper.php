<?php

namespace App\Mapper;

use App\Entity\BookOrder;
use App\Model\Admin\BookOrder\BookOrderBriefDetailsResponse;

// This mapper is designed to map output information about all book orders
class BookOrderBriefDetailsMapper implements BookOrderBriefDetailsMapperInterface
{

    public function __construct(private readonly BookBriefDetailsMapperInterface $bookBriefDetailsMapper)
    {
    }

    public function map(BookOrder $order): BookOrderBriefDetailsResponse
    {

        return (new BookOrderBriefDetailsResponse())
            ->setId($order->getId())
            ->setNumber($order->getNumber())
            ->setStatus($order->getStatus()->getTitle())
            ->setCreatedAt($order->getCreatedAt()?->getTimestamp())
            ->setUpdatedAt($order->getUpdatedAt()?->getTimestamp())
            ->setTasksCount(count($order->getUserTasks()))
            ->setBook($this->bookBriefDetailsMapper->map($order->getBook()));
    }

}
