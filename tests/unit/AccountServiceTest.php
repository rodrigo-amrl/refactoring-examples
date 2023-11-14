<?php

declare(strict_types=1);

use App\AccountService\Refactored\AccountService;
use App\AccountService\Refactored\Factories\AccountFactory;
use PHPUnit\Framework\TestCase;

final class AccountServiceTest extends TestCase
{

    public function testSignUpAccount(): void
    {
        $accountService = new AccountService();
        $accountService->signup(AccountFactory::make());
    }
}
