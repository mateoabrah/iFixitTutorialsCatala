<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IfixitService
{
    protected $baseUrl = 'https://es.ifixit.com/api/2.0';

    public function getTutorials($query = null)
    {
        $url = "{$this->baseUrl}/wikis/CATEGORY";

        if ($query) {
            $url .= "?q=" . urlencode($query);
        }

        $response = Http::get($url);

        return $response->json();
    }

    public function getCategories()
{
    $response = Http::get("{$this->baseUrl}/categories")->json();
    
    $categories = [];
    foreach ($response as $category => $subcategories) {
        $categories[] = $category;
    }

    return $categories;
}


    public function getTutorialsByCategory($category)
    {
        return Http::get("{$this->baseUrl}/wikis/{$category}")->json();
    }

    public function getTutorialDetails($wikiName)
    {
        $url = "{$this->baseUrl}/wikis/{$wikiName}";
        $response = Http::get($url);

        return $response->json();
    }
}
