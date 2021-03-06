.PHONY: it help stan test

it: vendor stan test

help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

stan: ## Run static analysis
	vendor/bin/phpstan analyse

test: ## Run PHPUnit tests
	vendor/bin/phpunit

vendor: composer.json ## Install dependencies through composer
	composer update
