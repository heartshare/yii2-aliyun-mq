<?php

namespace xiazhuful\aliyunmq;

/**
 * 阿里云HTTP收消息
 *
 * @author Zhou Yangzhi <505557473@qq.com>
 * @since v1.0
 */
class Receive extends Aliyunmq
{
    /**
     * @var string http头部信息（发送）
     */
    private $_header;
    /**
     * @var string http请求url（发送）
     */
    private $_url;
    /**
     * @var string 签名
     */
    private $_signature = "Signature";
    /**
     * @var string 消费者组id
     */
    private $_consumerid = "ConsumerId";
    /**
     * @var string 访问码
     */
    private $_ak = "AccessKey";

    /**
     * 发送消息
     */
    public function __construct()
    {
        $this->_header = $this->_getHeader();
        $this->_url = $this->_getUrl();
    }

    /**
     * http头部信息（接收）
     */
    private function _getHeader()
    {
        // 构造签名标记
        $newline = "\n";
        $date = time()*1000; // 构造时间戳
        $signString = $this->topic . $newline . $this->consumer_group . $newline . $date; // 签名字符串
        $sign = Util::calSignatue($signString, $this->user_secretkey); // 计算签名
        $signFlag = $this->_signature . ":" . $sign;

        // 构造密钥标记
        $akFlag = $this->_ak . ":" . $this->user_accesskey;

        // 构造消费者组标记
        $consumerFlag = $this->_consumerid . ":" . $this->consumer_group;

        // 构造http请求发送内容类型标记
        $contentFlag = "Content-Type:text/html;charset=UTF-8";

        $requestHeader = array(
            $signFlag,
            $akFlag,
            $consumerFlag,
            $contentFlag,
        );

        return $requestHeader;
    }

    /**
     * http请求url（接收）
     */
    private function _getUrl()
    {
        $date = time()*1000; // 构造时间戳
        $requestUrl = $this->url . "/message/?topic=" . $this->topic . "&time=" . $date . "&num=32"; // 构造http请求url

        return $requestUrl;
    }
	
	/**
     * 接收消息
     */
    public function receive()
    {
        Curl::get($this->_header, $this->_url);
    }
}