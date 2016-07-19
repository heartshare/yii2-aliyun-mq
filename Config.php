<?php

namespace xiazhuful\aliyunmq;

use yii\base\Component;

/**
 * 阿里云HTTP收发消息配置
 *
 * @author Zhou Yangzhi <505557473@qq.com>
 * @since v1.0
 */
class Config extends Component
{
    /**
     * @var string 申请的主题
     */
    protected $topic;
    /**
     * @var string 公测环境的url
     */
    protected $url;
    /**
     * @var string 申请的访问码
     */
    protected $user_accesskey;
    /**
     * @var string 申请的密钥
     */
    protected $user_secretkey;
    /**
     * @var string 生产者组id
     */
    protected $producer_group;
    /**
     * @var string 消费者组id
     */
    protected $consumer_group;
}