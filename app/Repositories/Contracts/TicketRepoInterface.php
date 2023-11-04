<?php

namespace App\Repositories\Contracts;

interface TicketRepoInterface
{
    public function getTicketsForEvent(int $id); 

    public function totalTicketsForEvent(int $id); 

    public function getTotalTicketsForEvent(int $id);

    public function createEventWithOneTicket($ticketType, $ticketPrice, $createdEvent);

    public function createEventWithMultipleTicket($data, $createdEvent);

    public function createEventWithNoTicket($createdEvent);
}