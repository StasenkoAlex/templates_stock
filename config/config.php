;<? exit(); ?>

license = 89ddifebfd ongojhrnls opvmqwwo b76b58697e ggijehdlno nnkplootrv opx4ya832c bcagbfe9ce emhngpmkgl jlmonwrxty sb947ccfde eb8eghalfd gpkjirollp rtrqr7o3y9 bf9d6h8dba blafjfkkin nloqrtjsqr pavax5ve45 9gdebeddac bgghjnlomr lrpppsn3s3 rdya7c9d6h efgkffemel fjkm

[database]

;Сервер базы данных
db_server = "localhost"

;Пользователь базы данных
db_user = "root"

;Пароль к базе
db_password = ""

;Имя базы
db_name = "test"

;Префикс для таблиц
db_prefix = s_;

;Кодировка базы данных
db_charset = UTF8;

;Режим SQL
db_sql_mode =;

;Смещение часового пояса
;db_timezone = +04:00;


[php]
error_reporting = E_ALL;
php_charset = UTF8;
php_locale_collate = ru_RU;
php_locale_ctype = ru_RU;
php_locale_monetary = ru_RU;
php_locale_numeric = ru_RU;
php_locale_time = ru_RU;
;php_timezone = Europe/Moscow;

logfile = admin/log/log.txt;

[smarty]

smarty_compile_check = true;
smarty_caching = false;
smarty_cache_lifetime = 0;
smarty_debugging = false;
smarty_html_minify = false;
 
[images]
;Использовать imagemagick для обработки изображений (вместо gd)
use_imagick = true;

;Директория оригиналов изображений
original_images_dir = files/originals/;

;Директория миниатюр
resized_images_dir = files/products/;

;Изображения категорий
categories_images_dir = files/categories/;

/* banners */
;Изображения баннеров
banners_images_dir = files/slides/;
/*/ banners */

;Изображения брендов
brands_images_dir = files/brands/;

;Файл изображения с водяным знаком
watermark_file = simpla/files/watermark/watermark.png;

[files]

;Директория хранения цифровых товаров
downloads_dir = files/downloads/;
