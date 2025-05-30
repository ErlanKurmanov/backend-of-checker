<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Contracts\DomainCheckServiceInterface;
use App\Http\Requests\DomainRequest;

class DomainCheckController extends Controller
{
    protected DomainCheckServiceInterface $domainCheckService;
    public function __construct(DomainCheckServiceInterface $domainCheckService)
    {
        $this->domainCheckService = $domainCheckService;
    }

    public function check(DomainRequest $request): JsonResponse
    {
        $validatedDomains = $request->validated()['domains'];
        $results = $this->domainCheckService->checkAvailability($validatedDomains);
        return response()->json($results);
    }
}
