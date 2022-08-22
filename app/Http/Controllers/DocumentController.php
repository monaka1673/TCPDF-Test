<?php
namespace App\Http\Controllers;

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
}