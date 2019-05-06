setup:
	docker-compose build --no-cache && \
	docker-compose up -d && \
	cp .env.example .env && \
	docker-compose exec acapella-web php artisan key:generate && \
	docker-compose exec acapella-web php artisan migrate