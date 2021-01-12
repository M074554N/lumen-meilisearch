# Lumen + Meilisearch example 

This is an example on using the Lumen PHP framework with Meilisearch search engine. It makes use of the sample `movies.json` dataset and adds a search endpoint to search all movies.

## Why Meilisearch?
I would say fr the following reasons:

- It's built in Rust 
- It's super fast (~3ms for query)
- No complexities and un-needed advanced features like Elasticsearch

## How to setup?
For easy distribution, I used Docker. You can easily follow these steps:

#### If you have `make` command on your system:
1. run `git clone https://github.com/M074554N/lumen-meilisearch.git`
2. then `cd ./lumen-meilisearch`
3. and `make up` this will bring all containers up and run any MySQL migrations

#### If you don't have `make` command on your system:
1. run `git clone https://github.com/M074554N/lumen-meilisearch.git`
2. then `cd ./lumen-meilisearch`
3. and `cd app && docker-compose up -d`
4. and `docker exec -it lumen_meilisearch_php php artisan migrate`

Then you should have the app available at `http://localhost:8080` and the search endpoint is `/search`

EXAMPLE: `http://localhost:8080/search?q=avengers`

## Notes:
- MySQL is not used yet in this example, but we will make use of it in the future to build and add to our index dynamically. 
