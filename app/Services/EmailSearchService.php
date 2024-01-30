<?php

namespace App\Services;

use App\Models\SearchData;
use App\Search\ProviderManager;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class EmailSearchService
{
    /** @var ProviderManager */
    protected $providerManager;

    public function __construct()
    {
        $this->providerManager = App::make(ProviderManager::class);
    }

    public function searchEmails($name, $company, $linkedinUrl)
    {
        return $this->providerManager->searchEmail($name, $company, $linkedinUrl);
    }
}
