<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 

class OrderFormController 
{
    // 仮データ
    // 最短配送日
    public $delivaly_start_day = 1; 
    public $view_delivaly_day = 5; 
    // 表示する配送日
    // 各都道府県ごとの最短配送日
    public $area = [
        "北海道" => 1,"青森県" => 4,"岩手県" => 2,"宮城県" => 2,"秋田県" => 2,"山形県" => 2,"福島県" => 2,
        "茨城県" => 2,"栃木県" => 2,"群馬県" => 2,"埼玉県" => 2,"千葉県" => 2,"東京都" => 2,"神奈川県" => 2,
        "新潟県" => 2,"富山県" => 2,"石川県" => 2,"福井県" => 2,"山梨県" => 2,"長野県" => 2,"岐阜県" => 2, 
        "静岡県" => 2,"愛知県" => 2, "三重県" => 2,"滋賀県" => 2,"京都府" => 2,"大阪府" => 2,"兵庫県" => 2,
        "奈良県" => 2,"和歌山県" => 2,"鳥取県" => 2,"島根県" => 2,"岡山県" => 2,"広島県" => 2,"山口県" => 2,
        "徳島県" => 2,"香川県" => 2,"愛媛県" => 2,"高知県" => 2,"福岡県" => 2,"佐賀県" => 2,"長崎県" => 2,
        "熊本県" => 2,"大分県" => 2,"宮崎県" => 2,"鹿児島県" => 2,"沖縄県" => 1
    ];

    public function index() 
    {
        return view('order_form')->with('area',$this->area);
    }

    public function delivalyDaysCreate(Request $request) 
    {
        // 選択した配送先の配送開始可能日
        $delivaly_area_day = $this->area[$request->input('area')];
        
        // 現在15時以降か
        $today = Carbon::now(); 
        if($today->lte(Carbon::createFromTimeString('15:00:00'))){
            $delivaly_date = $today->addDay();
        }
        
        // 配送希望日の開始日 
        $delivaly_date = $today->addDays($delivaly_area_day + $this->delivaly_start_day);        

        // 表示する配送日
        $delivaly_dates = array();
        for( $i=0; $i < $this->view_delivaly_day; $i++ ){
            // 土日か
            if($delivaly_date->isSaturday()) {
                $delivaly_date->addDay();
            }
            else if($delivaly_date->isSunday()) {
                $delivaly_date->addDays(2);
            }
            array_push($delivaly_dates,$delivaly_date->format('m月d日'));
            $delivaly_date->addDay();
        }

        return view('order_form_delivaly_date',compact('delivaly_dates'));
    }

}
