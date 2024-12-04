<?php

namespace App\Clients;

use Laravel\Passport\Client;

class PassportClient extends Client
{
    public function skipsAuthorization(): bool
    {
        return true;
    }
}
