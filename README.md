# Test for Tigratika



## Разворачивание сервера

1. Клонируйте репозиторий и перейдите в директорию проекта

    ```bash
    git clone https://gitlab.com/laravel9133630/test-task-for-tigratika.git
    cd test-task-for-tigratika
    ```
   
2. Сделайте файл docker_run запускаемым (хелпер для запуска одноразовых контейнеров)

   ```bash
   sudo chmod u+x docker_run
   ```

3. Установите зависимости

    ```bash
    ./docker_run composer install
    ```

4. Создайте файл .env и сгенерируйте ключ приложения

   ```bash
   cd /src/back
   cp .env.example .env
   cd ../../
   ./docker_run artisan key:generate
   ```

5. Создайте файл базы данных database.sqlite

   ```bash
   touch /src/back/database/database.sqlite
   ```
   
6. Запустите миграции для создания таблиц

   ```bash
   ./docker_run artisan migrate
   ```
   
7. Можете запускать все контейнеры

   ```bash
   docker compose build
   docker compose up -d
   ```
   
*В качестве базы данных используется SQLite*

*Для более быстрой верстки был использован tailwindcss*
