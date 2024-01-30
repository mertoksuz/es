<?php

namespace App\Search;

use Illuminate\Support\Facades\Cache;

class ProviderManager
{
    /** @var SearchProviderInterface[] */
    protected $providers = [];
    protected $currentPosition = 0;

    public function addProvider(SearchProviderInterface $provider)
    {
        $this->providers[] = $provider;
    }

    public function searchEmail($name, $company, $linkedinUrl)
    {

        Cache::put('provider_index', $this->currentPosition);
        $this->currentPosition = Cache::get('provider_index');

        while ($this->currentPosition < count($this->providers)) {
            $provider = $this->providers[$this->currentPosition];
            $emails = $provider->search($name, $company, $linkedinUrl);

            // Add custom validation logic here
            if (!empty($emails)) {
                return [
                    'provider' => $provider->getProvider(),
                    'data' => $emails
                ];
            }

            $this->moveToNextProvider();
        }

        return null;
    }

    protected function moveToNextProvider()
    {
        $this->currentPosition++;

        if ($this->currentPosition >= count($this->providers)) {
            $this->currentPosition = 0;
        }

        Cache::put('provider_index', $this->currentPosition);
    }

    /**
     * @param $data
     * @return bool
     */
    protected function isValidEmail(?array $data): bool
    {
        if (!is_null($data)) {
            foreach ($data as $result) {
                return isset($result['email']) && filter_var($result['email'], FILTER_VALIDATE_EMAIL);
            }
        }

        return false;
    }

}
