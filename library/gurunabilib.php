<?php

require_once(dirname(__FILE__). "/common/util.php");
require_once(dirname(__FILE__). "/conf/define.php");

/**
 * Gurunabi Web API library
 *
 * Version: 1.0.0
 * Author : kno.rsr75@gmail.com
 */
class GurunabiPhpLib {

    public $_access_key;

    function __construct($access_key) {
        $this->_access_key = $access_key;
    }

    /**
     * レストラン検索(簡易版)
     *
     * @param $option array  search option
     * @param $format String response format. default json
     * @return result
     */
    public function searchRestaurant($option, $format = "json") {
        if (!Util::is_associative_array($option)) {
            // 検索オプションの指定なし
            // 準正常ハンドリングは後程実装
            return ;
        }

        $prm_array = $this->_analyze_option($option);
        $prm_array["format"] = $format;

        // http_build_url が入っていればそっちを使います。
        // 今回は誰でも利用できる環境なので、http_build_url相当を作成
        $url = $this->_http_build_url(REST_SEARCH_VER1_API_URL, $prm_array);

        $json = file_get_contents($url);
        $obj = Util::compatible_json_decode($json);

        return $obj;
    }

    private function _analyze_option($option) {

        $result = array();

         foreach($option as $key => $value) {
            $t_value = Util::trim_emspace($value);
            switch ($key) {
                case 'name':
                case 'name_kana':
                    // url encode
                    $result[$key] = urlencode($t_value);
                break;

                // 値の加工無の場合
                case 'latitude':
                case 'longitude':
                case 'range':
                    $result[$key] = urlencode($t_value);

                    if (!array_key_exists('range', $result)) {
                        $result['range'] = DEFAULT_SEARCH_RANGE;
                    }

                break;

                case 'area':
                    // 拡張予定
                break;

                case 'freeword':
                    // 拡張予定
                break;
            }
        }
        echo var_export($result, true);
        return $result;
    }

    private function _http_build_url($url, $options) {
        $url .= "keyid=". $this->_access_key;

        foreach($options as $key => $value) {
            $url .= "&$key=$value";
        }
        return $url;
    }
}
