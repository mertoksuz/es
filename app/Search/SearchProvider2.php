<?php

namespace App\Search;

use Illuminate\Support\Facades\Http;

class SearchProvider2 extends BaseSearchProvider implements SearchProviderInterface
{
    public function __construct($providerMeta, $apiKey)
    {
        $this->url = $providerMeta['url'];
        $this->apiKey = $apiKey;
        $this->provider = $providerMeta['name'];
    }

    public function search(string $name, string $company, string $linkedinUrl)
    {
        try {
            $response = Http::withToken($this->apiKey)
                ->get($this->url, [
                    'linkedInProfileUrl' => $linkedinUrl,
                ]);

            $data = $response->json();

            $result = $this->validate($data);

            return $result;
        } catch (\Exception $e) {
            // Log the error
            \Log::error("Error while querying provider {$this->provider}: {$e->getMessage()}");
        }
    }

    private function validate(array $data)
    {
        return !empty($data) ? $data : null;
    }
}
