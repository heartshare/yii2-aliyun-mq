<?php

namespace xiazhuful\aliyunmq;

/**
 * 阿里云HTTP收发消息cURL
 *
 * @author Zhou Yangzhi <505557473@qq.com>
 * @since v1.0
 */
class Curl
{
    /**
     * POST请求
     */
    public static function post($header, $url, $content)
    {
        // 初始化网络通信模块
        $ch = curl_init();
        // 设置http头部内容
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // 设置http请求类型,此处为POST
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // 设置http请求的url
        curl_setopt($ch, CURLOPT_URL, $url);
        // 设置http请求的body
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        // 构造执行环境
        ob_start();
        //开始发送http请求
        curl_exec($ch);
        //获取请求应答消息
        $result = ob_get_contents();
        //清理执行环境
        ob_end_clean();
        //关闭连接
        curl_close($ch);

        return $result;
    }

    /**
     * GET请求
     */
    public static function get($header, $url)
    {
        // 初始化网络通信模块
        $ch = curl_init();
        // 填充http头部信息
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // 设置http请求类型,此处为GET
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        // 设置http请求url
        curl_setopt($ch, CURLOPT_URL, $url);
        // 打开http头部信息
        curl_setopt($ch, CURLOPT_HEADER, 1);
        // 构造执行环境
        ob_start();
        // 开始发送http请求
        curl_exec($ch);
        // 获取请求应答消息
        $result = ob_get_contents();
        // 清理执行环境
        ob_end_clean();
        // 打印请求应答信息
        var_dump($result);
        // 关闭http网络连接
        curl_close($ch);
    }
}
?>