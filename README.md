# yii2-aliyun-mq
[![Latest Stable Version](https://poser.pugx.org/daixianceng/yii2-aliyun-mq/v/stable)](https://packagist.org/packages/daixianceng/yii2-smser) [![Total Downloads](https://poser.pugx.org/daixianceng/yii2-aliyun-mq/downloads)](https://packagist.org/packages/daixianceng/yii2-smser) [![Latest Unstable Version](https://poser.pugx.org/daixianceng/yii2-aliyun-mq/v/unstable)](https://packagist.org/packages/daixianceng/yii2-smser) [![License](https://poser.pugx.org/daixianceng/yii2-aliyun-mq/license)](https://packagist.org/packages/daixianceng/yii2-smser)

Yii2 Aliyun Mq （阿里云消息队列扩展）

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Check the [composer.json](https://github.com/daixianceng/yii2-smser/blob/master/composer.json) for this extension's requirements and dependencies.

To install, either run

```
$ php composer.phar require xiaozhuful/yii2-aliyun-mq "*"
```

or add

```
"xiaozhuful/yii2-aliyun-mq": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
return [
    'components' => [
        'aliyunmq' => [
            'class' => 'xiazhuful\aliyunmq\Send',
            'topic' => 'xxx',
            'url' => 'http://publictest-rest.ons.aliyun.com',
            'user_accesskey' => 'xxx',
            'user_secretkey' => 'xxx',
            'producer_group' => 'xxx',
            'consumer_group' => 'xxx'
        ]
    ],
];
```

```php
Yii::$app->aliyunmq->send('15000000000');
```

OR

```php
return [
    'components' => [
        'aliyunmq' => [
            'class' => 'xiazhuful\aliyunmq\Receive',
            'topic' => 'xxx',
            'url' => 'http://publictest-rest.ons.aliyun.com',
            'user_accesskey' => 'xxx',
            'user_secretkey' => 'xxx',
            'producer_group' => 'xxx',
            'consumer_group' => 'xxx'
        ]
    ],
];
```

```php
Yii::$app->aliyunmq->receive('15000000000');
```

## License

**yii2-aliyun-mq** is released under the BSD 3-Clause License. See the bundled `LICENSE` for details.
