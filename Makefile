up:
	docker-compose up -d --remove-orphans

down:
	docker-compose down --remove-orphans || \
	docker-compose down --remove-orphans

console:
	docker-compose up -d --remove-orphans && docker-compose exec phpfpm bash
