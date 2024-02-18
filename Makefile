## this commands can be run only from container
install:
	composer install --no-interaction --no-scripts
phpunit:
	bin/phpunit

sh: ## login into container (shell)
	docker-compose exec php sh
bash: ## login into container (bash)
	docker-compose exec php bash
test: ## Run tests
	docker-compose exec php bin/phpunit tests --colors=always --coverage-text --coverage-html=build/coverage

## Docker commands
build: ## Builds the Docker images
	docker-compose build --pull --no-cache
up: ## Start containers in detached mode (no logs)
	docker-compose up --detach
stop: ## Stop containers
	docker-compose php
remove: ## Remove containers
	docker-compose stop
	docker-compose rm -fv php
