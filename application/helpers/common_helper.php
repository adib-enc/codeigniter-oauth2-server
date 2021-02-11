<?php

if (!function_exists('preout')) {
    function preout($v)
    {
        echo "<pre>";
        var_dump($v);
        echo "</pre>";
    }
}

if (!function_exists('preson')) {
    function preson($v)
    {
        echo "<pre>";
        echo json_encode($v,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        echo "</pre>";
    }
}

if (!function_exists('presonRet')) {
    function presonRet($v)
    {
        return json_encode($v,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}

if (!function_exists('jsonResponse')) {
    function jsonResponse($respCode, $msg, $data, $fmt = true)
    {
        if($fmt){
            $r = [
                'status' => $respCode ,
                'message' => $msg ,
                'data' => $data
            ];
        }else{
            $r = $data;
        }

        $CI = &get_instance();
        $CI->output
            ->set_status_header((int) $respCode)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($r));
    }
}

if (!function_exists('toFile')) {
    function toFile($content = "cnt", $file = "file")
    {
        $f = fopen($file, "w");
        fwrite($f,$content);
        fclose($f);
        return true;
    }
}

if (!function_exists('arrayGet')) {
    function arrayGet($array, $key, $default = NULL)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}

if (!function_exists('lq')) {
    function lq()
    {
        $ci = &get_instance();
        echo $ci->db->last_query();
    }
}

if (!function_exists('sbadmin')) {
    function sbadmin($file)
    {
        return base_url($file);
    }
}

if (!function_exists('getHeaderList')) {
    function getHeaderList() {
        //create an array to put our header info into.
        $headerList = array();
        //loop through the $_SERVER superglobals array.
        foreach ($_SERVER as $name => $value) {
            //if the name starts with HTTP_, it's a request header.
            if (preg_match('/^HTTP_/',$name)) {
                //convert HTTP_HEADER_NAME to the typical "Header-Name" format.
                $name = strtr(substr($name,5), '_', ' ');
                $name = ucwords(strtolower($name));
                $name = strtr($name, ' ', '-');
                //Add the header to our array.
                $headerList[$name] = $value;
            }
        }
        //Return the array.
        return $headerList;
    }
}

if (!function_exists('decodeJWT')) {
    function decodeJWT($jwt) {
        $exp = explode(".", $jwt);
        $decoded = [];
        
        foreach($exp as $e){
            $decoded[] = base64_decode($e);
        }
        
        return $decoded;
    }
    
}
