<?php
declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MeiliSearch\Client;

class BuildIndex extends Command
{
    protected $signature = 'build:movies-index';

    protected $description = 'Build the movies index in Meilisearch';

    private $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client('http://127.0.0.1:7700');
    }

    public function handle()
    {
        try {
            $index = $this->client->getOrCreateIndex('movies');

            $path = storage_path('datasets/movies.json');
            $moviesFile = file_get_contents($path);

            $movies = json_decode($moviesFile, true);

            $index->addDocuments($movies);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 0;
        }

        $this->info('Index built successfully');
    }
}
