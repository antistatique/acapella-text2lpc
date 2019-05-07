setup:
	docker-compose build --no-cache && \
	docker-compose up -d && \
	cp .env.example .env && \
	docker-compose exec acapella-web php artisan key:generate && \
	docker-compose exec acapella-web php artisan migrate
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