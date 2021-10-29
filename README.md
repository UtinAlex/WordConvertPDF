Для запуска проекта выполните:

1. composer update

2. npm i

3. php artisan serve

4. npm run watch-poll

Создайте шаблон документ word с переменными:
(пример файл taskw2.docx в корне проекта)
Заказ сплит-системы
Бренд: ${brand}
Площадь: ${area}

Воспользуйтесь формой в браузере, загрузите свой шаблон и укажите значение в полях,
заберите файл PDF в папке проекта storage/app/public/converted.pdf

Для корректного отображения русских букв используйте встроеный шрифт
DejaVu Serif (LibereOffice) в своём шаблоне.
Для настройки других шрифтов воспользуйтесь инструкцией
https://stackoverflow.com/questions/990181/dompdf-problem-with-cyrillic-characters
