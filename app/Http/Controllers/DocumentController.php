<?php
namespace App\Http\Controllers;

use Locale;
use TCPDF;

class DocumentController extends Controller
{
   private $pdf; // インスタンス変数を宣言

   public function __construct(TCPDF $pdf)
   {
        // コンストラクタインジェクションでTCPDFクラスをインスタンス化
       $this->pdf = $pdf;
   }

   public function downloadPdf()
   {
       // フォント、スタイル、サイズ をセット
       $this->pdf->setFont('kozminproregular','',30);
       // ページを追加
       $this->pdf->addPage();
       // HTMLを描画、viewの指定と変数代入
       $this->pdf->writeHTML(view("document.pdf", ['name' => 'PDFさん'])->render());
       // 出力の指定です、ファイル名、拡張子、Dはダウンロードを意味します。
       $this->pdf->output('test' . '.pdf', 'D');
       return;
   }

   public function lineFeed(){
        // フォント、スタイル、サイズ をセット
        $this->pdf->setFont('kozminproregular','',30);
        // ページを追加
        $this->pdf->addPage();
        // 長い文字列を改行して表示する
        $long = '123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789';
        $short1 = str_split($long,27);
        // y軸の座標を変更＆配列の要素数を指定
        $this->pdf->Text(10,10,$short1[0]);
        $this->pdf->Text(10,20,$short1[1]);
        $this->pdf->Text(10,30,$short1[2]);
        $this->pdf->Text(10,40,$short1[3]);
        if(isset($short1[4])){
            $this->pdf->Text(10,50,$short1[4]);
        };
        // 出力の指定です、ファイル名、拡張子、Dはダウンロードを意味します。
        $this->pdf->output('line_feed' . '.pdf', 'D');
        return;
   }

   public function multiCell(){
        // フォント、スタイル、サイズ をセット
        $this->pdf->setFont('kozminproregular','',30);
        // ページを追加
        $this->pdf->addPage();
        // 長い文字列を改行して表示する
        $long = '123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789';
        $this->pdf->multiCell(50,50,$long,0,'L',0,0,50,50);
        // 出力の指定です、ファイル名、拡張子、Dはダウンロードを意味します。
        $this->pdf->output('line_feed' . '.pdf', 'D');
        return;
   }
}