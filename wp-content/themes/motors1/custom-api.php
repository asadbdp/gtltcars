<?php

/**
 * Template Name: Custom API
 * 
 */

 get_header();



echo '<div class="container">

      <div class="row main-wrap">
        <div class="col-12">
          <h2>Auction sheet verification by chassis number or VIN</h2>
          <p><strong>Get the original Auction Sheet Verification by Global Trade to buy the Japanese car with complete peace of mind !</strong></p>
          <p>This report is an exact briefing of scratches, repairs, dents, paint or repair marks, replaced parts, mileage, airbags, rust, and corrosion assessment, interior/exterior condition and accident history ever happened before importing the car in Bangladesh. Now you can verify more than 12 years old auction sheets.</p>
          <p><strong>Just Enter the chassis number of your car to get original auction sheet only at BDT 850 Taka</strong></p>
          <p>গাড়িটির চ্যাসিস নাম্বারটি লিখে (যেমন: NZT260-3209892) সার্চ বাটনে ক্লিক করতে হবে।</p>
          <p style="margin-bottom:60px;">চ্যাসিস নাম্বার পাওয়া গেলে BUY বাটনে ক্লিক করে আপনার আপনার ইনফরমেশন গুলো দিয়ে ৮৫০ টাকা অনলাইন পেমেন্ট করতে হবে। সকল প্রসেস শেষ হলে সাথে সাথেই আপনার গাড়ির ১০০% জেনুইন অকশন শিটটি গাড়ির ছবি সহ দেখতে পাবেন। আপনার ইমেলেও একটি কপি পেয়ে যাবেন । ইমেল থেকে আপনি ফরম্যাট এ ডাউনলোড করে নিতে পারবেন।</p>

          
        
        </div>';
      
      
      

## ACCESS CODE
$code='1219950_eeff3329eb6f27a85a27b839e24eff4c'; // change it

## TRUE REPORT in browser or wget:
## 1) wget http://78.46.90.228/xml/report?code=SEE STEP (2)&chassis=NZE141-6048723
##    press Ctrl+U, view XML and find <key>VALUE</key>
## 2) wget http://78.46.90.228/xml/report?code=SEE STEP (2)&chassis=NZE141-6048723&key=VALUE
##    you get True Report !

## TRUE REPORT history
## http://78.46.90.228/xml/reports?code=SEE STEP (2)
## TRUE REPORT+ history
## http://78.46.90.228/xml/reports+?code=SEE STEP (2)

## FOR TESTING USE THIS CHASSIS-NUMBERS
## NZE141-6048720
## NZE141-6048721
## ..
## NZE141-6048729
## ** later send email "restore balance for username ..."

## INIT
$chassis =preg_replace("/[^a-zA-Z0-9\-]/",'',$_GET['chassis']);
$max_date=preg_replace("/[^0-9\-]/",'',$_GET['max_date']);
$year=(int)$_GET['year'];
$key=preg_replace("/[^a-zA-Z0-9\-]/",'',$_GET['key']);

##-------------------------------------------------------------
echo '
<!-- TITLE -->
<LINK REL="StyleSheet" HREF="https://ajes.com/zreport.css" TYPE="text/css">


<!-- FORM -->
<form id=formID action="" method="GET" style="; width:90%">
    Enter the chassis number of your car
  <br>
  <input type=text name=chassis class=chassis value="" onfocus="if(this.value==\'chassis number or VIN\'){this.value=\'\';}"
         onkeypress="if(event.keyCode==13){document.forms[\'formID\'].submit();return false;}">

  <a onclick="document.forms[\'formID\'].submit();return false;" href="javascript:void(0);" class="button">FIND</a>

 
</form>

<script>
  var ff=document.forms["formID"];
  ff["chassis"].value="'.($chassis==""?"chassis number or VIN":$chassis).'";
  ff["max_date"].value="'.($max_date==""?date("Y-m-d"):$max_date).'";
  ff["year"].value="'.($year==""?"Year":$year).'";
  function filter_update(n) {
    var l = document.querySelectorAll(".car_selector_all");
    for(var i=0;i<l.length;i++){l[i].style.display="";}
    for(var i=0;i<l.length;i++){
      var k=0,class_arr=l[i].className.split(" ");
      for(c in class_arr) {
        if (class_arr[c]=="car_selector_all") {continue;}
        if(class_arr[c]==n){k=1;}
      }
      if (k==0) {l[i].style.display="none";}
    }
  }

  
</script>

<!-- OUTPUT -->
<div style="clear:both"></div>
<div class=output>';
##-------------------------------------------------------------

## Get data
$arr = r_get($code,$chassis,$year,$max_date,$key);

## (1) Balance
//echo r_info($arr);

## (2) Listing
if ($key=='') {r_list($arr,$chassis,$year,$max_date);}

## (3) True Report
else {r_show($arr);}

echo '
<!-- /OUTPUT -->
</div>';

function r_info($arr) {
  return '<div class=info style="border:0px solid">'.'
            '.trim($arr['balance'],' -').' reports available for <u>'.$arr['username'].'</u>
            <br>API-key for translate<br><i>'.$arr['key_for_translate'].'</i>
          </div>';
}

function r_get($code,$chassis,$year,$max_date,$key) {
  if ($chassis=='') {die();} //<span style="color:#b00">empty chassis</span>
  $s = @file_get_contents('http://78.46.90.228/xml/report?code='.$code.'&chassis='.$chassis.'&year='.$year.'&max_date='.$max_date.'&key='.$key);
  $arr=xml2array($s);
  if ($arr['aj'][0]['error']!='') {die('<span style="color:#b00">'.$arr['aj'][0]['error'].'</span>');}
  return $arr['aj'][0];
}

function r_list($arr,$chassis,$year,$max_date) {
  $c_arr=array('#73aa00','#70dd7c','#ff0000','#66a16e','#2EA6B8','#e38553','#5f5b79','#f75957');
  $s='<div class=helper>'.$chassis.'</div>';
  if ($arr['row'][0]['color']==0) {$s.='<span style="color:#73aa00;font-size:16px">100% FOUND</span>';}
  $s.='
  <table cellspacing=0 cellpadding=0 border=0 style="margin-top:7px">';
  $k=0; $filter=array();
  foreach($arr['row'] as $r) { $k++;
    if ($k>10) {break;} // number of images in listing

    //@file_put_contents(dirname(__FILE__)."/report_api_get_url.log", "report.php key=".$r['key']."\n" ,FILE_APPEND);

    ## for filter
    $r['car_color']=trim($r['car_color'],' -.');
    $filter['car_model'][]=$r['car_model'];
    $filter['car_year'][]=$r['car_year'];
    $filter['car_displacement'][]=$r['car_displacement'];
    $filter['car_transmission'][]=$r['car_transmission'];
    $filter['car_grade'][]=$r['car_grade'];
    $filter['car_color'][]=$r['car_color'];
    $filter['car_result'][]=$r['car_result'];

    $s.='
    <tr class="car_selector_all '.c_tpl('car_model',$r).' '.c_tpl('car_year',$r).' '.c_tpl('car_displacement',$r).' '.c_tpl('car_transmission',$r).' '.c_tpl('car_grade',$r).' '.c_tpl('car_color',$r).' '.c_tpl('car_result',$r).'">
      <td><img src="'.$r['image'].'" style="border-color:'.$c_arr[$r['color']].'"></td>
      <td style="font-size:14px;padding-left:4px">
        '.$r['car_model'].'<br>
        '.$r['car_year'].' '.$r['car_displacement'].'cc<br>
        '.$r['car_transmission'].' '.$r['car_grade'].'<br>
        '.($r['car_color']==''?'':$r['car_color'].'<br>').'
        '.$r['car_result'].'<br>
      </td>
      <td><button onclick=clickfunction(this) data-url="http://172.16.0.234/gari/verify-auction-sheet/?chassis='.$chassis.($year==0?'':'&year='.$year).($max_date==''||$max_date==date('Y-m-d')?'':'&max_date='.$max_date).'&key='.$r['key']."\"
             class=button_buy style='margin-left:7px'>buy</button></td>
    </tr>\n";
    if ($r['color']==0) {break;} // 0 mean chassis found
  }
  $s.='
  </table>';
  echo filter_out($filter).$s;
}


function c_tpl($s,$r) {return $s.'_'.str_replace(' ','_',$r[$s]);}

function filter_out($filter) {
  return '';
}

function l_tpl($name,$filter) {$s='';
  $arr=$filter[$name];
  $arr=array_unique($arr);
  asort($arr);
  foreach($arr as $val) {                                       
    $s.='<a href="javascript:void(0)" onclick="filter_update(\''.c_tpl($name,array($name=>$val)).'\')" class=r_filter>'.$val.'</a> ';
  } return $s;
}

function r_show($arr) {
  foreach($arr['report'] as $report) { $k=0; $imgs='';
    echo '<div class=true_report>';
    foreach($report as $key=>$val) { $k++;
      if ( preg_match("/^img/i",$key) ) {
        $imgs.='<a href="'.$val.'" target=_blank><img src="'.$val.'" border=0 width=500px></a><br>';
        continue;
      }
      echo '<div '.($k%2==0?'':'style="background:#f0f0f0"').'>'.preg_replace("/_/",' ',ucfirst($key)).': '.$val."</div>";
    }
    echo '</div>'.$imgs;
  }
}

function xml2array($text) {
  $reg_exp = '/<(\w+)[^>]*>(.*?)<\/\\1>/s';
  preg_match_all($reg_exp, $text, $match);
  foreach ($match[1] as $key=>$val) {
    if ( preg_match($reg_exp, $match[2][$key]) ) {
      $array[$val][] = xml2array($match[2][$key]);
    } else {$array[$val] = $match[2][$key];}
  } return $array;
}


echo '</div>';
    
    
   echo '</div>';
   ?>




<script>
  function clickfunction(pay){
    var cachedUrl = localStorage.getItem("res_url");

    if (cachedUrl) {
      localStorage.removeItem("res_url");
    }
    var url = 'https://buy.stripe.com/test_bIY9BTa3U5hqbZucMN';
    var rurl = pay.getAttribute("data-url");
    localStorage.setItem("res_url", rurl);
    var newurl = localStorage.getItem("res_url");

    window.location.href = url;
  }
</script>




<?php get_footer(); ?>