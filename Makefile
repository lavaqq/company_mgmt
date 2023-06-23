.PHONY: deploy install

deploy:
	npm install
	npm run build
	rsync -avz public/build SM1:~/sites/mgmt.loak.studio/public
	ssh SM1 'cd ~/sites/mgmt.loak.studio && git pull origin main && make install'

install:
	composer install
	php artisan view:clear
	php artisan config:clear
	php artisan event:clear
	php artisan route:clear
	php artisan cache:clear
	php artisan storage:link