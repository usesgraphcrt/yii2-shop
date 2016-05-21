Yii2-shop
==========
Модуль представляет из себя бекенд для Интернет-магазина.

В состав входит возможность управлять (CRUD):

* Категориями
* Производителями
* Товарами
* Ценами
* Фильтрами (опциями)

Установка
---------------------------------

Выполнить команду

```
php composer require pistol88/yii2-shop "*"
```

Или добавить в composer.json

```
"pistol88/yii2-shop": "*",
```

И выполнить

```
php composer update
```

Миграция:

```
php yii migrate --migrationPath=vendor/pistol88/yii2-shop/migrations
```

Настройка
---------------------------------

В секцию modules конфига добавить:

```
    'modules' => [
        //..
        'shop' => [
            'class' => 'pistol88\shop\Module',
            'adminRoles' => ['administrator'],
        ],
        'filter' => [
            'class' => 'pistol88\filter\Module',
            'adminRoles' => ['administrator'],
            'relationModel' => 'pistol88\shop\models\Product',
            'relationFieldName' => 'category_id',
            'relationFieldValues' =>
                function() {
                    return \pistol88\shop\models\buldTextTree();
                },
        ],
        'relations' => [
            'class' => 'pistol88\relations\Module',
            'fields' => ['code'],
        ],
        'yii2images' => [
            'class' => 'pistol88\gallery\Module',
            'imagesStorePath' => dirname(dirname(__DIR__)).'/storage/web/images/store',
            'imagesCachePath' => dirname(dirname(__DIR__)).'/storage/web/images/cache',
            'graphicsLibrary' => 'GD',
            'placeHolderPath' => dirname(dirname(__DIR__)).'/storage/web/images/placeHolder.png',
        ],
        //..
    ]
```

В shop можно передать modelMap, где указать нужные вам модели. Также можно указать стандартные yiiшные controllerMap, viewPath, чтобы подменить контроллеры и вьюхи своими в процессе развития вашего магазина.

В секцию components:

```
    'components' => [
        //..
        'fileStorage' => [
            'class' => '\trntv\filekit\Storage',
            'baseUrl' => '@storageUrl/source',
            'filesystem'=> function() {
                $adapter = new \League\Flysystem\Adapter\Local('some/path/to/storage');
                return new League\Flysystem\Filesystem($adapter);
            },
        ],
        //..
    ]
```

Использование
---------------------------------
* ?r=shop/product
* ?r=shop/category
* ?r=shop/producer
* ?r=filter/filter

Виджеты
---------------------------------
Виджеты в разработке.