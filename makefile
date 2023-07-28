setup:
	cp .env.example .env
	sed -i '' 's/mysql/sqlite/g' .env
	sed -i '' '/DB_HOST=127\.0\.0\.1/d; /DB_PORT=3306/d; /DB_DATABASE=laravel/d; /DB_USERNAME=root/d; /DB_PASSWORD=/d' .env
	composer i
	npm i
	npm run build
	php artisan key:gen
	php artisan storage:link
	php artisan migrate --seed --force
	php artisan user:create --dev

new-db:
	php artisan migrate:fresh --seed --force
	php artisan user:create --dev