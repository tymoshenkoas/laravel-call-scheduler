**Project installation guide**

Docker Desktop shold be installed and set up (also WSL if you are using Windows like me).

1. Clone repository with

`git clone git@github.com:tymoshenkoas/laravel-call-scheduler.git <directory name>`

2. Go to project directory and run

`docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs`

3. Create file .env and copy all content from .env.example to it.

OPTIONAL: add aliase to your shell configuration (~/.zshrc or ~/.bashrc) for running `sail` instead of `./vendor/bin/sail`
`alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`

4. Run `./vendor/bin/sail up -d`

5. If some containers aren't running run next commands one by one

`./vendor/bin/sail stop`

`./vendor/bin/sail down -v`

`./vendor/bin/sail up -d`

5. Run `./vendor/bin/sail artisan key:gen`

6. Run `./vendor/bin/sail npm install` and `./vendor/bin/sail npm run build`

7. Run `./vendor/bin/sail artisan rabbitmq:consume` for queue worker