<?php

namespace xiazhuful\aliyunmq;

/**
 * 阿里云HTTP发消息
 *
 * @author Zhou Yangzhi <505557473@qq.com>
 * @since v1.0
 */
class Send extends Config
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
     * @var string 生产者组ID
     */
    private $_producerid = "ProducerId";
    /**
     * @var string 访问码
     */
    private $_ak = "AccessKey";

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->_header = $this->getHeader();
        $this->_url = $this->getUrl();
    }
    
    /**
     * 发送消息
     */
    public function send($content)
    {
        Curl::post($this->_header, $this->_url, $content);
    }

    /**
     * http头部信息
     */
    public function getHeader($content)
    {
        // 构造签名标记
        $newline = "\n"; // 计算时间戳
        $date = time()*1000;
        $signString = $this->topic . $newline . $this->producer_group . $newline . $this->md5($content) . $newline . $date; // 签名字符串
        $sign = Util::calSignatue($signString, $this->user_secretkey); // 计算签名
        $signFlag = $this->_signature . ":" . $sign; // 构造签名标记

        // 构造密钥标记
        $akFlag = $this->_ak . ":" . $this->user_accesskey;

        // 构造生产者组标记
        $producerFlag = $this->_producerid . ":" . $this->producer_group;

        // 构造http请求发送内容类型标记
        $contentFlag = "Content-Type:text/html;charset=UTF-8";

        $requestHeader = array(
            $signFlag,
            $akFlag,
            $producerFlag,
            $contentFlag,
        );

        return $requestHeader;
    }

    /**
     * http请求url
     */
    public function gettUrl()
    {
        $date = time()*1000; // 构造时间戳
        $requestUrl = $this->url . "/message/?topic=" . $this->topic . "&time=" . $date . "&tag=http&key=http"; // post请求url

        return $requestUrl;
    }
}