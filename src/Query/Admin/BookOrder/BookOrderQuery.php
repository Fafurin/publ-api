<?php

namespace App\Query\Admin\BookOrder;

use App\Entity\BookOrder;
use App\Mapper\BookOrderBriefDetailsMapperInterface;
use App\Mapper\BookOrderFullDetailsMapperInterface;
use App\Mapper\UserTaskBriefDetailsMapperInterface;
use App\Model\Admin\BookOrder\BookOrderBriefDetailsResponse;
use App\Model\Admin\BookOrder\BookOrderFullDetailsResponse;
use App\Model\Admin\BookOrder\BookOrderListResponse;
use App\Repository\BookOrderRepository;
use function PHPUnit\Framework\isInstanceOf;

class BookOrderQuery implements BookOrderQueryInterface
{
    public function __construct(
        private readonly BookOrderRepository                  $bookOrderRepository,
        private readonly BookOrderBriefDetailsMapperInterface $bookOrderBriefDetailsMapper,
        private readonly BookOrderFullDetailsMapperInterface  $bookOrderFullDetailsMapper,
        private readonly UserTaskBriefDetailsMapperInterface  $userTaskBriefDetailsMapper
    ) {
    }

    // Returns brief information about all book orders by the update date
    public function getAllOrdersSortedByUpdatedAt(): BookOrderListResponse
    {
        $orders = $this->bookOrderRepository->findAllSortedByUpdatedAt();

        $items = array_map(
            fn (BookOrder $bookOrder) => $this->getOrderBriefDetailsById($bookOrder->getId()),
            $orders
        );

        return new BookOrderListResponse($items);
    }

    // Returns full information about the book order by id
    public function getFullOrderDetailsById(int $id): BookOrderFullDetailsResponse
    {
        $order = $this->bookOrderRepository->getById($id);
        $tasks = $this->userTaskBriefDetailsMapper->map($order->getUserTasks()->toArray());
        return $this->bookOrderFullDetailsMapper->map($order)
            ->setTasks($tasks);

    }

    // Returns brief information about the book order by id
    private function getOrderBriefDetailsById(int $id): BookOrderBriefDetailsResponse
    {
        return $this->bookOrderBriefDetailsMapper->map($this->bookOrderRepository->getById($id));

    }

}
