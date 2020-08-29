# LatestNews Magento2  Extension
**Add Latest News Related to product offer with content in your website**

## LatestNews Extension

# Features

* Title is inserted with name offer in header
* Click on title customer can see all the available offer in the store
* Admin can insert Widget in the editor for customer attraction
___
# How to install

Add the module in app/code/ folder in magento root like as app/code/Abhay/LatestNews
and run the command 
```php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento indexer:reindex
php bin/magento cache:clean
php bin/magento cache:flush
```
___
# How to Enable 

![LatestNews1](https://user-images.githubusercontent.com/55655451/90330843-8459f880-dfcd-11ea-9abd-e86061e9cd76.png)

* Click on the Latest Offer sider bar menu
* Navigate to Latest Offer -> Configuration -> Add Latest News -> Module Enable - Select “Yes” 
* Set the color code setting, To show offer in frontend
___

All the data is saved in the grid with the information as per the given image

![LatestNews2](https://user-images.githubusercontent.com/55655451/90330850-8b810680-dfcd-11ea-90c3-45e3f81f56dc.png)

___

Admin can also edit the news like as 

![LatestNews3](https://user-images.githubusercontent.com/55655451/90330853-8e7bf700-dfcd-11ea-939f-373495022fb3.png)


___

# My Magento Module

| S.No.| Module Name | Description |
| --- | --- | --- |
| 1.| [Learning Module](https://github.com/Abhay-Agrawal/Abhay_Learning-1.0.0) | To Add text message, Drop Down, Radio Button, Multi Select and Text Area in store configuration |
| 2.| [Custom Module](https://github.com/Abhay-Agrawal/CustomModule)| To Fetch the system configuration value and Product Information using GraphQl |
| 3.| [Custom Shipping](https://github.com/Abhay-Agrawal/Abhay_CustomShipping-1.0.0) | This module is used to add the Custom Shipping in the Website|
| 4.| [LatestNews](https://github.com/Abhay-Agrawal/Abhay_LatestNews-1.0.0) | Add Latest News Related to product offer with content in your website |
| 5.| [Customer Age](https://github.com/Abhay-Agrawal/Abhay_CustomerAge) |To add the age field on the registration page with custom validation |
| 6.| [GroupProductOptions](https://github.com/Abhay-Agrawal/Abhay_GroupProductOptions-1.0.0) | To show the group product options like as child product available quantity, SKU and custom message |

___
