<?php

namespace App\Search;

interface SearchProviderInterface
{
    /**
     * @param string $name
     * @param string $company
     * @param string $linkedinUrl
     * @return mixed
     */
    public function search(string $name, string $company, string $linkedinUrl);
}
