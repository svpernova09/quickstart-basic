@servers(['dev' => 'vagrant@192.168.10.10'])

@task('setup:dev', ['on' => 'dev'])
cd /home/vagrant/
rm -rf dev
git clone https://github.com/svpernova09/quickstart-basic.git dev
cd dev
git checkout exercise-8
cp .env.example .env
composer install
php artisan migrate
php artisan db:seed --force
php artisan up
@endtask

@task('deploy:dev', ['on' => 'dev'])
cd /home/vagrant/dev
php artisan down
git pull origin exercise-8
composer install
php artisan migrate --force
php artisan up
@endtask
