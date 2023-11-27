1, học PHP and laravel
-PHP:https://www.youtube.com/playlist?list=PL8y3hWbcppt21UiT79eZNhGYHmVJVV4xx
-laravel : https://www.youtube.com/watch?v=sMXkSWFlV28&list=PL8y3hWbcppt2nWBglaxrQm_A5sRjstdnK

2, install
-visual studio code

-   postman
    -XAMPP : https://www.apachefriends.org/download.html
    -composer :https://laravel.com/docs/4.2
    -mysql workbech :https://www.youtube.com/watch?v=BYwb50Xbf8s

3,API

-   product

*   lấy danh sách sản phẩm

*   lấy sản phẩm theo id
*   lấy tất cả ảnh theo id sản phẩm
*   lấy top 10 sản phẩm bán chạy
*   lấy sản phẩm theo mã kiểu sản phẩm

-   user

*   đăng nhập (token)
*   đăng nhập bằng google
*   đăng ký (token)

*   đăng xuất
*   quên mật khẩu
*   đặt lại mật khẩu

*   cập nhật thông tin
*   cập nhật mật khẩu
*   lấy tất cả bill theo user id

---------SET UP PROJECT---------------
----->1.clone project
----->2. tạo file .env -> paste đoạn dưới -> chạy lệnh : php artisan key:generate
----->3.tạo database : chạy lệnh: php artisan migrate

_----------------set up .env----------------------_
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=shoe_database
DB_USERNAME=root
DB_PASSWORD=123456

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
