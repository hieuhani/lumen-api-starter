<?php

namespace App\Services;

use App\Contracts\Services\KiuCompanyServiceContract;

class KiuCompanyService implements KiuCompanyServiceContract
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getCompanyUser($company_id)
    {
        // TODO: Fake
        return [
            'roles' => [
                [
                    'id' => 'd44f021f-9ec0-4adf-a8c4-d885825728d5',
                    'name' => 'Director',
                ],
            ],
            'company_user_id' => 'd44f021f-9ec0-4adf-a8c4-d885825728d5',
        ];
    }
}