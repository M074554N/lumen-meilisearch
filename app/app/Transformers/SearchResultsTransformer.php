<?php
declare(strict_types=1);

namespace App\Transformers;

class SearchResultsTransformer
{
    public static function transform(array $searchResults): array
    {
        $return['result'] = $searchResults['hits'] ?? [];
        $return['offset'] = $searchResults['offset'] ?? 0;
        $return['limit'] = $searchResults['limit'] ?? 20;

        return $return;
    }
}
