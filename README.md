## Vet-Prime

Requirements:
- Docker

To get started create copy of `auth.json.example` and rename it to `auth.json` and add your Nova credentials. Then execute this command
```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
Copy `.env.example` and rename it to `.env`. Then run `./vendor/bin/sail up`  

Then run these commands:
- `sail artisan key:generate`
- `sail artisan migrate --seed`

However, instead of repeatedly typing vendor/bin/sail to execute Sail commands, you may wish to configure a shell alias that allows you to execute Sail's commands more easily:  
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```  
To make sure this is always available, you may add this to your shell configuration file in your home directory, such as ~/.zshrc or ~/.bashrc, and then restart your shell.
  
More info about [Laravel Sail](https://laravel.com/docs/10.x/sail)

You can find web server on <http://0.0.0.0:80> and Mailpit on <http://0.0.0.0:8025>
