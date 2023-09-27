install: setup-docker install-app

setup-docker:
	docker-compose up -d --build

start-docker:
	docker-compose start

stop-docker:
	docker-compose stop

install-app:
	docker compose exec app composer install

start-test:
	php ./vendor/bin/phpunit