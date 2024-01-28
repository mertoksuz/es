<?php

namespace App\Services;

use App\Models\SearchData;
use Illuminate\Support\Facades\Http;

class EmailSearchService
{
    private $apiKey;

    public function __construct()
    {
        // Load API key from configuration or environment variables
        $this->apiKey = config('services.email_search.api_key');
    }

    public function searchEmails($name, $company, $linkedinUrl)
    {
        $providers = config('services.email_search.providers');

        foreach ($providers as $provider) {
            try {
                $response = Http::withToken($this->apiKey)
                    ->get($provider['url'], [
                        'name' => $name,
                        'company' => $company,
                        'linkedInProfileUrl' => $linkedinUrl,
                    ]);

                $data = $response->json();

                // Process the response data and store it in the database if needed

                // Check if valid email found
                if ($this->isValidEmail($data)) {
                    // Store the email in the database
                    $this->storeEmail($data);

                    // Return the search results
                    return $data;
                }
            } catch (\Exception $e) {
                // Log the error
                \Log::error("Error while querying provider {$provider['name']}: {$e->getMessage()}");
            }
        }

        // No valid email found from any provider
        return null;
    }

    /**
     * @param $data
     * @return bool
     */
    private function isValidEmail(array $data): bool
    {
        foreach ($data as $result) {
            return isset($result['email']) && filter_var($result['email'], FILTER_VALIDATE_EMAIL);
        }

        return false;
    }

    /**
     * @param array $data
     * @return void
     */
    private function storeEmail(array $data)
    {
        foreach ($data as $searchData) {
            SearchData::firstOrCreate([
                'name' => $searchData['name'],
                'email' => $searchData['email'],
            ]);
        }
    }
}
