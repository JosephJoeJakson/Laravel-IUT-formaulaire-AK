@servers(['web' => ['adrien-kaluzny@13.39.150.46']])

@story('deploy')
    update-depandencies
    update-database
    optimize-app
@endstory

@task('update-depandencies', ['on' => 'web'])
    composer install
    npm install
    npm run build
@endtask

@task('update-database', ['on' => 'web'])
    php artisan migrate
@endtask

@task('optimize-app', ['on' => 'web'])
    composer install --optimize-autoloader --no-dev
    php artisan optimize:clear
    php artisan optimize
@endtask
