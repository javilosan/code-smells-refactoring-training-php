.PHONY: build

build-image:
	docker build . --tag 'codesai-katas'

build:
	docker run --rm --interactive --tty --volume $$PWD:/app codesai-katas composer install

test:
	docker run --rm --interactive --tty --volume $$PWD:/app codesai-katas exec phpunit
