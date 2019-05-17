setup:
	cp docker-compose.override.yml.example docker-compose.override.yml && \
	docker-compose build --no-cache && \
	docker-compose up -d && \
	cp .env.example .env && \
	docker-compose exec acapella-web php artisan key:generate && \
	docker-compose exec acapella-web php artisan migrate && \
	docker-compose exec acapella-web php artisan db:seed && \
	git config core.hooksPath .githooks
build:
	docker-compose build
up:
	docker-compose up -d
migrations:
	docker-compose exec acapella-web php artisan migrate
stop:
	docker-compose stop
restart:
	docker-compose stop && docker-compose up -d
test:
	docker-compose exec acapella-web vendor/bin/phpunit --debug
db-seed:
	docker-compose exec acapella-web php artisan db:seed