# 前提
為了讓感測器上讀取出來的數據以視覺的方式呈現，開發了網頁讓數據以動態的方式呈現在網頁上。

# 【使用到的感測器】

  1. DL-100TM485
  2. LC-103
  3. LC-221
  4. PIR-130-DC

![感測器](https://user-images.githubusercontent.com/58096503/232536409-2ab20fbe-f7e1-4b86-90a9-e90b66522b5f.PNG)

---

# 【環境建置】

利用phpStuday設置環境
phpStuday是一PHP調試環境的程式集成包，包含Apache網頁伺服器+PHP+MySQL資料庫+phpMyAdmin(以web-Base方式架構在網站主機上的MySQL的資料庫管理工具)+ZendOptimizer所組成，方便使用。

# 【使用的技術】

*  HTML5+CSS3+Javascript-網頁開發
*  Chart.js-圖表製作
*  MySQL-資料庫儲存資料
*  Modbus UDP通訊協定-和感測器通訊操作數據的讀取
*  PHP-將感測器讀取出來的數據傳送到資料庫



---
# 【網頁呈現】

左邊section為各感測器數據觀看的頁面

![網頁](https://user-images.githubusercontent.com/58096503/232537986-d8a6f044-c735-4cf9-904a-b807dc0e1ec6.png)


---

# 【Demo】

## DL-100TM485感測器

以每2秒讀取感測器數據，由於環境為室內，所讀取出來的溫/濕度數據不會有很大的變動

https://user-images.githubusercontent.com/58096503/232543914-77fec2b6-d07b-43f3-a216-894a0666a3cc.mp4


## LC-103感測器

此感測器為控制電燈開和關，設計2個Button(on、off)來控制電燈。


https://user-images.githubusercontent.com/58096503/232553033-3ff84664-1fbf-4039-be27-a4285a2fefd4.mp4

## LC-221感測器

主要調整光線強度，以整數值0~100表示亮度大小。


https://user-images.githubusercontent.com/58096503/232553576-2cc3796c-d2ba-4b9c-9fff-5c8b3fa7c223.mp4


## PIR-130-DC感測器

主要偵測人體所產生的紅外線波，偵測範圍為直徑在大約8米範圍內


https://user-images.githubusercontent.com/58096503/232554029-0bb8b627-5c00-435b-9eb4-68ef95950322.mp4


