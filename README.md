## О проекте
Тестовое задания для компании MPFIT. 

Задача: Создать веб-приложение с использованием фреймворка Laravel (https://laravel.com/docs/9.x), которое включает
управление товарами и заказами

![Демонстрация](https://raw.githubusercontent.com/nikondi/test-mpfit/23d9694/demo.png)

## Документация

### Запуск приложения в Docker
1. Скопировать `/.env.example` в `/.env`, изменив параметры, если требуется

2. Запустить Docker-контейнер
    ```shell
    docker compose up -d
    ```

3. Установить зависимости Composer
    ```shell
   docker compose exec backend composer install
   ```
   
4. Установить зависимости Composer
    ```shell
   docker compose exec backend composer install
   ```
5. Сгенерировать ключ приложения

   ```shell
   docker compose exec backend php artisan key:generate
   ```
6. Выполнить миграцию БД 
    ```shell
   docker compose exec backend php artisan migrate
   ```


Сайт будет доступен по адресу http://localhost

### Наполнить БД фиктивными товарами
```shell
docker compose exec backend php artisan db:seed
```
