up:
	cd app && docker-compose up -d
	docker exec -it lumen_meilisearch_php php artisan migrate

down:
	cd app && docker-compose down

migrate:
	docker exec -it lumen_meilisearch_php php artisan migrate

migrate_fresh:
	docker exec -it lumen_meilisearch_php php artisan migrate:fresh

logs:
	cd app && docker-compose logs -f

test:
	cd app && docker exec -it lumen_meilisearch_php vendor/bin/phpunit
