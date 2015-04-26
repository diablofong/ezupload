#ezupload檔案上傳系統
-
ezupload檔案上傳系統是一個簡易的檔案上傳系統，提供了使用者註冊與上傳並管理自己檔案功能，而管理者也可以輕易的管理所有上傳的檔案，該系統可以快速的建立並應用於研討會論文上傳管理或學生專題檔案上傳管理之用。

##建置教學

1. php版本需要5.4以上

2. 下載壓縮檔後解壓縮放置您的網站目錄，如 ``` /var/www/html ```
	
3. 修改檔案目錄權限為可以讀寫，其目錄為 ``` <your project name>/web ```

4. 開啟終端機輸入以下指令安裝系統需要的套件 ``` composer install ```

5. 修改資料庫連線設定，開啟 ``` <your project name>/config/db.php ``` 設定資料庫連線ip、資料庫名稱、使用者帳號與密碼

6. 開啟終端機進入專案目錄,輸入以下指令系統會自動建置資料表單
  ``` ./yii migrate ```

7. 開啟瀏覽器輸入 ``` http:\\localhost\<your project name>\web ``` 就可以開啟系統，管理者登入帳密為admin/admin

## 系統圖片

![Alt text](web/image/1.png)

![Alt text](web/image/2.png)

![Alt text](web/image/3.png)

![Alt text](web/image/4.png)


## 版權說明

The MIT License (MIT)