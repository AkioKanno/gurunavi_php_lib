#gurunavi_php_lib
#ぐるなびWeb API のPHP用ライブラリ

##■ レストラン簡易検索例  
    
    // ライブラリの読み込み  
    request_once('ライブラリのパス/gurunavi_php_lib/config.php');  
    
    $lib = new GurunabiPhpLib("アクセスキー");  
    $option = array(  
        // 検索オプション(↓ ★簡易検索オプションから好きなの組み合わせ)  
        name => "やきとり次郎",  
        area => "港区",  
    );  
    
    $lib->searchRestaurant($option);  
    $result = $res;  


-----------------------------------------------------------

###★ 簡易検索設定オプション(何個でも組み合わせ可)
 - 店舗名検索  
    'name' => "やきとり次郎",

 - 店舗名カナ検索  
    'name_kana' => "ヤキトリジロウ",

 - 場所名検索(大阪 梅田駅)  
    'area' => "港区",

 - フリーワード検索(複数ある場合は","で区切って！)  
    'freeword' => "禁煙, シーフード",

 - 緯度経度検索  
    'latitude'  => "35.670082",  // 緯度
    'longitude' => "139.763267", // 経度
    // range = 1:300m(デフォルト) 2:500m  3:1000m  4:2000m  5:3000m
    'range'     => "1",

    ※ range は1以外の場合のみ入力

-----------------------------------------------------------

## ぐるなび Web APIページ
<http://api.gnavi.co.jp/api/manual.html>
