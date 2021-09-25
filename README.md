# Steam-Search

---

## 2-1 Data
### 1.Introduce the data:
本組的data分為6個部分，分別為:
* **Steam** : Game data from Steam. Each row has a unique AppID and is usually a separate release, excepting some re-releases and remasters.

* **steam_description_data** : Description information.

* **steam_media_data** : Contains links to screenshots, images and movies.

* **steam_requirements_data** : requirements information for each platform. 'Minimum' and 'recommended' columns are slightly cleaned versions of 'pc_requirements'.

* **steam_support_info** : Contains website, support url and support email for games that have them.

* **steamspy_tag_data** : Contains tags from SteamSpy and the number of votes for each tag for each game. Higher numbers can be considered more strongly associated with that tag.


### 2.What do the columns tables mean:
steam.csv 
|   Column_name  |    Description |       Type        |
|:----------------:|:--------------:|:--------------:|
|      appid       |     遊戲ID     | INT|
|       name       |    遊戲名稱    |VARCHAR|
|   release_date   |    發行日期    |VARCHAR|
|     english      |  是否支援英文   |TINYINT|
|    developer     |     開發商     |VARCHAR|
|    platforms     |     發行商     |VARCHAR|
|   required_age   |    年齡限制    |INT|
|    categories    |      分類      |VARCHAR|
|      genres      |    官方標籤    |VARCHAR|
|  steamspy_tags   |    社群標籤    |VARCHAR|
|   achievements   |    成就數量    |INT|
| positive_ratings |    正面評價    |INT|
| negative_ratings |    負面評價    |INT|
| average_playtime |  平均遊玩時間  |INT|
| median_playtime  | 遊玩時間中位數 |INT|
|      owners      |    發行數量    |VARCHAR|
|      price       |      價格      |FLOAT|

steam_description_data.csv
|   Column_name  |    Description |Type|
|:----------------:|:--------------:|:--------------:|
|steam_appid|遊戲ID|INT|
|detailed_description|詳細敘述|TEXT|
|about_the_game|關於遊戲|TEXT|
|short_description|簡短敘述|TEXT|

steam_media_data.csv
|   Column_name  |    Description |Type|
|:----------------:|:--------------:|:--------------:|
|steam_appid|遊戲ID|INT|
|header_image|遊戲圖示|TEXT|
|screenshots|遊戲截圖|TEXT|
|background|遊戲背景|TEXT|
|movies|相關影片|TEXT|

steam_requirements_data.csv
|   Column_name  |    Description |Type|
|:----------------:|:--------------:|:--------------:|
|steam_appid|遊戲ID|INT|
|pc_requirements|Windows電腦配備|TEXT|
|mac_requirements|MAC電腦配備|TEXT|
|linux_requirements|Linux電腦配備|TEXT|
|minimum|最低配備需求|TEXT|
|recommended|建議配備|TEXT|

steam_support_info.csv
|   Column_name  |    Description | Type|
|:----------------:|:--------------:|:--------------:|
|steam_appid|遊戲ID|INT|
|website|遊戲官方網站|TEXT|
|support_url|steam 遊戲頁面|TEXT|
|support_email|聯絡信箱|TEXT|


### 3.Where was the data from:
kaggle -> Steam Store Games (Clean dataset)

### 4.Other information about your data:
won't be updated in the future

### 5.Link to your data source
https://www.kaggle.com/nikdavis/steam-store-games

---

## 2.2 Application design
### 1.The purpose of your application
我們這組這次打算做出一個可供人們查詢Steam遊戲資料的平台，你可以在這個大平台上面查詢一些有用的資訊，例如你可以選出射擊遊戲裡評價最高的遊戲是哪一個之類的。

### 2.What kind of information will be presented to users
關於遊戲的基本資料(例如：遊戲名稱、語言、分類標籤、價格等等)

### 3.What kind of interaction will be available
讓使用者可以依照以下做查詢：
各種遊戲分類的排行(包括遊戲的各種資料)
以不同的價格、評價或遊玩時間分類

### 4.What kind of data will users be able to insert and update
搜尋紀錄(用來做熱搜排行)

### 5.What will be the platform:
Website
    
### 6.Expected interface look (use figure or text to explain)
有篩選窗口(資料範圍)
可選擇資料呈現的順序(不同欄位)

---

## Discussion
[HackMD](https://hackmd.io/EWDK6JHZQ6WzF0nAoEGOtw)









