@servers(['web' => ['adrien-kaluzny@13.39.150.46']])

@story('deploy')
    update-depandencies
    update-database
    optimize-app
@endstory

@task('update-depandencies', ['on' => 'web'])
    cd /home/adrien-kaluzny/adrien-kaluzny.dhonnabhain.me/app
    composer install
    npm install
    npm run build
@endtask

@task('update-database', ['on' => 'web'])
    cd /home/adrien-kaluzny/adrien-kaluzny.dhonnabhain.me/app
    php artisan migrate
@endtask

@task('optimize-app', ['on' => 'web'])
    cd /home/adrien-kaluzny/adrien-kaluzny.dhonnabhain.me/app
    composer install --optimize-autoloader --no-dev
    php artisan optimize:clear
    php artisan optimize
@endtask