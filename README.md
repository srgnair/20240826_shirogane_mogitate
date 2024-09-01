# もぎたて

## 環境構築

- Gitディレクトリのクローン
git clone https://github.com/srgnair/20240826_shirogane_mogitate.git
cd クローンしたディレクトリ

- composerインストールとファイルの編集
cd src
composer install

- .envファイルの設定
cp .env.example .env
code .

- .envファイルの編集
-を削除、+を追加

DB_CONNECTION=mysql
-DB_HOST=127.0.0.1
+DB_HOST=mysql
DB_PORT=3306
-DB_DATABASE=laravel
-DB_USERNAME=root
-DB_PASSWORD=
+DB_DATABASE=laravel_db
+DB_USERNAME=laravel_user
+DB_PASSWORD=laravel_pass

- Docker環境のセットアップ
docker compose up -d

- アプリケーションキーの生成
docker compose exec php bash
php artisan key:generate

- データベースのマイグレーション
php artisan migrate

- シンボリックリンクの設定
php artisan storage:link

- シーディング
php artisan db:seed

- 接続
http://localhost/productsにアクセス

- 権限エラーが出る場合
cd /src
chmod -R 777 storage bootstrap/cache


## 使用技術（実行環境）
- Laravel 9.52.16
- nginx 1.21.1
- php 8.0.2
- mysql 8.0.26

## ER図
![ER](https://github.com/user-attachments/assets/fe0ad44d-2d27-40cc-9e8a-27d37c01520a)


## URL
- 環境開発:http://localhost/
