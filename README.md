# Geolocation(Geocode)

## Запуск приложения

**1. Добавить файл .env:**

        API_KEY="your_api_key"

        DB_CONNECTION=mysql
        DB_HOST=mysql
        DB_PORT=3306
        DB_DATABASE=geocode
        DB_USERNAME=root
        DB_PASSWORD=root

**2. Собрать и запустить контейнеры:**
 
     docker-compose up --build -d

   
**3. Проверить запущенные контейнеры:**

	 docker-compose ps


**4. Подключиться к контейнеру PHP-FPM:**

   - **Для Windows:**
     
     docker exec -it geolocation-fpm-1 bash
   
   - **Для Ubuntu:**
     
     docker exec -it geolocation_fpm_1 bash
   
   
**5. Измененить права доступа к директории storage (при необходимости):**
 
     chmod -R 777 storage   

**6. Выполнить миграции:**

     php artisan migrate
     

## Доступ к приложению

После запуска, приложение будет доступно по адресу: [http://localhost:8098/]

## Доступ к базе данных из PHP Storm

- **Хост (Host):** localhost
- **Порт (Port):** 33061
- **Пользователь (User):** root
- **Пароль (Password):** root
- **База данных (Database):** geocode

## Приложение развернуто на хостинге: 
   http://alexaibk.beget.tech/
   
