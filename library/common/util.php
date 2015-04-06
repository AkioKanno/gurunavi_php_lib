<?php

class Util {

    /**
     * トリム処理（全角/半角スペース対応）
     *
     * @param  $str  String トリム対象文字列
     * @return String
     */
    public static function trim_emspace($str) {
        $str = preg_replace('/^[ ]+/u', '', $str);
        $str = preg_replace('/[ 　]+$/u', '', $str);
        return $str;
    }

    /**
     * 連想配列か判定処理
     *
     * @param  $array array() 調査対象
     * @return boolean
     */
    public static function is_associative_array($array) {
        return (is_array($array) && array_diff_key($array, array_keys(array_keys($array))));
    }

    /**
     * JSONのエンコード処理
     * (PHPのバージョンによってはjson_encodeが入っていないため)
     *
     * @param $object
     * @return array encode json
     */
    public static function compatible_json_encode($object) {
        if (function_exists("json_encode")) {
            return json_encode($object);
        } else {
            require_once(dirname(__FILE__)."/../services_json.php");
            $json = new Services_JSON();
            return $json->encode($object);
        }
    }

    /**
     * JSONのデコード処理
     * (PHPのバージョンによってはjson_encodeが入っていないため)
     *
     * @param $object
     * @return array decode json
     */
    public static function compatible_json_decode($object, $assoc = false) {
        if (function_exists("json_encode")) {
            return json_decode($object, $assoc ? SERVICES_JSON_LOOSE_TYPE: 0);
        } else {
            require_once(dirname(__FILE__)."/../services_json.php");
            $json = new Services_JSON($assoc ? SERVICES_JSON_LOOSE_TYPE: 0);
            return $json->decode($object);
        }
    }
}
