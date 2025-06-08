# お問い合わせフォーム
  Laravel + Liverireを使用した、お問い合わせの管理・検索・削除ができるwebアプリケーションです。

## 環境構築
Dockerのビルド

  1.git clone git@github.com:coachtech-material/laravel-docker-template.git  
  2.docer-compose up -d --build  

※MySQLはOSによって起動しない場合があるのでそれぞれのPCに合わせてdocer-compose.ymlファイルを編集してください。

Laravel環境構築

  1.docker-compose exe php bash  
  2.composer install  
  3.env.exampleファイルから.envを作成し、環境変数を変更  
  4.php artisan key:generate  
  5.php artisan migrate  
  6.php artisan db:seed


## 使用技術(実行環境)
  ・PHP 7.4.9  
  ・Laravel 8.83.8  
  ・MySQL  8.0.26  
  ・Fortify 1.19.1  
  ・Livewire 2.12.8  
  ・Blade  
  ・Docker/Doker Compose  
  ・Git/GitHub  



## ER図
![image](https://github.com/user-attachments/assets/4530ae01-2c4c-486c-b4e3-32b57a51aeac)


## URL
・開発環境：http://localhost/  
・phpMyAdmin : http://localhost:8080/
