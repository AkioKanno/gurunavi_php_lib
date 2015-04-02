/////////////////////////////////////

  gurunavi_php_lib
  ぐるなびWeb API のPHP用ライブラリ

/////////////////////////////////////

■ レストラン簡易検索例

 // ライブラリの読み込み
request_once('ライブラリのパス/gurunavi_php_lib/config.php');
$lib = new GurunabiPhpLib("アクセスキー");

$option = array(
    // 検索オプション
    name => "やきとり次郎",
    area => "港区",

    // ※ ↓ の｢★簡易検索オプション｣から好きなの組み合わせ
);

$lib->searchRestaurant($option);
$result = $res;


★ 簡易検索設定オプション(何個でも組み合わせ可)
 - 店舗名検索
    name => "やきとり次郎",

 - 店舗名カナ検索
    name_kana => "ヤキトリジロウ",

 - 場所名検索(大阪 梅田駅)
    area => "港区",

 - フリーワード検索(複数ある場合は","で区切って！)
    freeword => "禁煙, シーフード",
    

-----------------------------------------------------------

■ レストランカスタム検索例(玄人向け)

request_once('ライブラリのパス/gurunavi_php_lib/config.php');
$lib = new GurunabiPhpLib("アクセスキー");
// $option は連想配列で検索したい情報を設定
// ※どんな情報で検索できるかは｢http://api.gnavi.co.jp/api/manual.html#trigger3｣の
     レストラン検索APIを参照
$lib->customSearchRestaurant($option);

$result = $lib->res;

