<?php
/**
 * リクエストとか方言思いつかないし
 * 別にPHP標準機能ラップするだけなので
 * 男は直で呼び出す！
 * 訳) 面倒くさいから後回し。
 */
class Request {

    public function isPost() {}
        
    public function isGet() {}

    public function getGet() {}

    public function getPost() {}

    public function getHost() {}

    public function getSession($key) {}

    public function clearSession($key) {}

    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getBaseUrl()
    {
        $script_name = $_SERVER['SCRIPT_NAME'];

        $request_uri = $this->getRequestUri();

        if (0 === strpos($request_uri, $script_name)) {
            return $script_name;
        } else if (0 === strpos($request_uri, dirname($script_name))) {
            return rtrim(dirname($script_name), '/');
        }

        return '';
    }

    public function getPathInfo()
    {
        $base_url = $this->getBaseUrl();
        $request_uri = $this->getRequestUri();

        if (false !== ($pos = strpos($request_uri, '?'))) {
            $request_uri = substr($request_uri, 0, $pos);
        }

        $path_info = (string)substr($request_uri, strlen($base_url));

        return $path_info;
    }

}
