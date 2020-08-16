# LatestNews Magento2  Extension
Add Latest News Related to product offer with content in your website

## LatestNews Extension

# Features

* Title is inserted with name offer in header
* Click on title customer can see all the available offer in the store
* Admin can insert Widget in the editor for customer attraction

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

# How to Enable 

![LatestNews1](https://user-images.githubusercontent.com/55655451/90330843-8459f880-dfcd-11ea-9abd-e86061e9cd76.png)

* Click on the Latest Offer sider bar menu
* Navigate to Latest Offer -> Configuration -> Add Latest News -> Module Enable - Select “Yes” 
* Set the color code setting, To show offer in frontend

![LatestNews2](https://user-images.githubusercontent.com/55655451/90330850-8b810680-dfcd-11ea-90c3-45e3f81f56dc.png)

![LatestNews3](https://user-images.githubusercontent.com/55655451/90330853-8e7bf700-dfcd-11ea-939f-373495022fb3.png)


# Check Other Magento2 Module

| Module Name | Description |
| --- | --- |
| GroupProductOptions | [GroupProductOptions Magento2 Extension](https://github.com/Abhay-Agrawal/Abhay_GroupProductOptions-1.0.0) |
| LatestNews | [Add Latest News Related to product offer with content in your website](https://github.com/Abhay-Agrawal/Abhay_LatestNews-1.0.0) |
