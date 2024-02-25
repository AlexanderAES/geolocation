# Проект Geolocation(Geocode)

## Запуск приложения

**1. Собрать и запустить контейнеры:**
 
     docker-compose up --build -d

   
**2. Проверить запущенные контейнеры:**

	 docker-compose ps


**3. Подключиться к контейнеру PHP-FPM:**

   - **Для Windows:**
     
     docker exec -it geolocation-fpm-1 bash
   
   - **Для Ubuntu:**
     
     docker exec -it geolocation_fpm_1 bash
   
   
**4. Измененить права доступа к директории storage (при необходимости):**
 
     chmod -R 777 storage   

**5. Выполнить миграции:**

     php artisan migrate

## Доступ к приложению

После запуска, приложение будет доступно по адресу: [http://localhost:8098/]

## Доступ к базе данных из PHP Storm

- **Хост (Host):** localhost
- **Порт (Port):** 33061
- **Пользователь (User):** root
- **Пароль (Password):** root
- **База данных (Database):** geocode
