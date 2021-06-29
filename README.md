## Run project

```  ./vendor/bin/sail up ```

## Migrations 

``` docker exec -it projet_web_1 php artisan migrate ```

## Seeding

```docker exec -it projet_web_1 php artisan migrate:fresh --seed```
``` docker exec -it projet_web_1 php artisan db:seed --class=YourSeeder ``` 

## Model 

```php artisan make:model Model ```

## Middleware 

```php artisan make:middleware Middleware ```

## Controller 

```php artisan make:controller Controller ```

## Seeding 

