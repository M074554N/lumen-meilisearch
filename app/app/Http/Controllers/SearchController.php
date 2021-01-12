<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Transformers\SearchResultsTransformer;
use Illuminate\Http\Request;
use MeiliSearch\Client;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $client = new Client('meilisearch:7700');

        $index = $client->getIndex('movies');

        $result = SearchResultsTransformer::transform($index->search($request->q));

        return response()->json($result, 200);
    }
}
