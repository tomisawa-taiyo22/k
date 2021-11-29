web: vendor/bin/heroku-php-apache2 public
public function boot()
{
    if (\App::environment('production')) {
        \URL::forceScheme('https');
    }
}
