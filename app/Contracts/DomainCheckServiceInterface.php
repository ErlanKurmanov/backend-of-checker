<?php

namespace App\Contracts;

interface DomainCheckServiceInterface
{
    public function checkAvailability(array $domains): array;
}
