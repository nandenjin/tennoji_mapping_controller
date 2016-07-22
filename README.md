# tennoji_mapping_controller
Mapping Project, 2014-2015

## 構造

第2期投影（体育館投影）で使った時そのまんま。ごちゃってすみません。

* src/index.html : 投影機側。ビデオをロードして再生する。
* src/console.html : 制御側（リモートコンソール）。投影機側をネットワーク経由で操作する。
* src/src/command.php, src/cmd.oda : 制御側と投影側のコマンド中継ぎスクリプト。
* src/status.php, src/response.oda : 制御側のコマンドが正しく行ったかの確認のための、投影側のステータスを記録するスクリプト。

* misc/pngファイル: 動画作ったりライトアップのベース作ったりするのに使ったフレーム画像
* misc/pdnファイル: 現場でフレームファイルいじろうと思ってPixiaで書いた編集用ファイル
* misc/mp4ファイル: 第1期投影（部室棟投影）に使ったムービーファイル。別にいらないんだけど一緒にあったので同梱

## 起動方法
PHP環境のあるWebサーバーを立てる。必要があればcmd.odaの中身を適当に初期化する。以上。

## 投影側操作方法

### 概要

投影ソースは2パート、ビデオと待機中用の画像フレーム。

待機中用フレームは、光にしたいところを透過画像にするとレインボーカラーエフェクトがかかるおまけ付き（このソースコードのデフォルトの状態がそれ）。

ビデオ側は、このソースコードではさらに2chにわかれてるけど、増やしたり減らしたりするのに便利な構造にはなってないので、renderObj（画面に表示するImageオブジェクトを入れる）を切り替えてるリモートレシーバーのソースあたりを自前でいじるべし。

### キーボード操作一覧

* C → キャリブレーションモードと投影モードの切り替え
* S → ビデオスタート
* P → ビデオストップ
* R → ビデオリセット（初期位置にシーク）
* E → 待機モードに移行（ライトアップON）

## 制御側操作方法

### 概要

上の通りビデオ2ch分を制御するようになっているので、ここも適宜書き換えるべし。コマンドと言ってもJSONで送る文字列と同じものを、投影側のレシーバー関数で読み取ればいいだけなので、独自操作は増やし放題。

アナウンスは、音響系統から警告放送を流さなければいけなかったので急遽増やした機能。特に中身には関係ない。

### 送出可能なコマンド

* 投影側のスタート・ストップ・リセット・待機ライトアップONに対応するもの
* ビデオch切り替え

## まとめ

READMEを書くためにもう一度ソース読み直したけど、突貫工事すぎて目も当てれない



