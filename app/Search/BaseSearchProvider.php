<?php

namespace App\Search;

use App\Models\SearchData;
use Illuminate\Support\Facades\Http;

class BaseSearchProvider
{
    protected $url;
    protected $apiKey;
    protected $provider;

    protected function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * @param array $data
     * @return void
     */
    protected function storeEmail(array $data)
    {
        foreach ($data as $searchData) {
            SearchData::firstOrCreate([
                'name' => $searchData['name'],
                'email' => $searchData['email'],
            ]);
        }
    }

    public function getProvider(): string
    {
        return $this->provider;
    }
}
