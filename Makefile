.PHONY: it
it: vendor fix stan test

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: fix
fix: vendor
	vendor/bin/php-cs-fixer fix

.PHONY: stan
stan: ## Run static analysis
	vendor/bin/phpstan analyse

.PHONY: test
test: ## Run PHPUnit tests
	vendor/bin/phpunit

vendor: composer.json ## Install dependencies through composer
	composer update
