<?php

namespace xiazhuful\aliyunmq;

use yii\base\Component;

/**
 * 阿里云HTTP收发消息配置
 *
 * @author Zhou Yangzhi <505557473@qq.com>
 * @since v1.0
 */
class Aliyunmq extends Component
{
    /**
     * @var string 申请的主题
     */
    public $topic;
    /**
     * @var string 公测环境的url
     */
    public $url;
    /**
     * @var string 申请的访问码
     */
    public $user_accesskey;
    /**
     * @var string 申请的密钥
     */
    public $user_secretkey;
    /**
     * @var string 生产者组id
     */
    public $producer_group;
    /**
     * @var string 消费者组id
     */
    public $consumer_group;
}