<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use App\Contracts\DomainCheckServiceInterface;


class DomainCheckService implements DomainCheckServiceInterface
{
    public function checkAvailability(array $domains): array
    {
        $results = [];

        foreach ($domains as $domain) {
            $normalizedDomain = strtolower(trim($domain));

            $isTaken = (crc32($normalizedDomain) % 2 === 0);

            if ($isTaken) {
                $expiryDate = Carbon::now()
                    ->addMonths(rand(1, 60))
                    ->addDays(rand(0, 30))
                    ->toDateString();

                $results[] = [
                    'domain'     => $normalizedDomain,
                    'status'     => 'taken',
                    'expires_at' => $expiryDate,
                    'message'    => "Домен {$normalizedDomain} занят. Дата окончания регистрации: {$expiryDate}.",
                ];
            } else {
                $results[] = [
                    'domain'     => $normalizedDomain,
                    'status'     => 'available',
                    'expires_at' => null,
                    'message'    => "Домен {$normalizedDomain} доступен для покупки!",
                ];
            }
        }

        return $results;
    }
}
