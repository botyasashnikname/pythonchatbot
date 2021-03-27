<?php
ob_start();
set_time_limit(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$token = '1778251670:AAHT-Q2VzrLLMprK96sUsbNI1IRu98LgHUs';

$admin_list = ["1131104579","233332"];


$Kanallarimiz  = "@DASTURCHI_Yigit , @tarmoq_ovchilari     ";

$musor_channel = "1367708709";
$data_channel = "1422622222";

$mantili_knopkalar = ["/admin","/static","/lang","/my","/top","/start","/help"];


//==================@API_KOD VS @API_KOD_GROUP ======================//Function
define('API_KEY', $token);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function admin_bot($cid){
global $admin_list;
foreach($admin_list as $values){
if(trim($values) == trim($cid)){
$result = "yes";
break;
}else{
$result = "no";
}
}
return $result;
}
function bot_command($array){
foreach($array as $values){
if(trim($values->type) == "bot_command"){
$result = "yes";
break;
}else{
$result = "no";
}
}
return $result;

}

function mantililar($text){
global $mantili_knopkalar;
foreach($mantili_knopkalar as $values){
if(trim($values) == trim($text)){
$result = "yes";
break;
}else{
$result = "no";
}
}
return $result;
}



function lang($cidd){
return file_get_contents('lang/'.$cidd.'.lang');
}


    

//==================@API_KOD VS @API_KOD_GROUP ======================//Update


$update = json_decode(file_get_contents('php://input'));
var_dump($update);
//User
$message = $update->message;
$tx = $message->text;
$cid = $message->chat->id;
$uid = $message->from->id;
$cty = $message->chat->type;
$mid = $message->message_id;
$entities = $message->entities;
$first_name = $message->from->first_name;
$rtx = $message->reply_to_message->photo;


//CallBack
$data = $update->callback_query->data;
$cmid = $update->callback_query->message->message_id;
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$ccap = $update->callback_query->message->caption;
$qid = $update->callback_query->id; 

$ctext = $update->callback_query->message->text; 
$callfrid = $update->callback_query->from->id; 
$callfname = $update->callback_query->from->first_name;  
$calltitle = $update->callback_query->message->chat->title; 
$calluser = $update->callback_query->message->chat->username; 

//inline
$inline = $update->inline_query;
$inid = $inline->from->id;
$inuser = $inline->from->username;
$inname = $inline->from->first_name;
$inquery = $inline->query;
$inlineid = $inline->id;
 
//Channel
$channel = $update->channel_post; 
$channel_text = $channel->text;
$channel_mid = $channel->message_id; 
$channel_id = $channel->chat->id; 
$channel_title = $channel->chat->title;
$channel_user = $channel->chat->username; 

$chanel_doc = $channel->document; 
$chanel_vid = $channel->video; 
$chanel_mus = $channel->audio; 
$chanel_voi = $channel->voice; 
$chanel_gif = $channel->animation; 
$chanel_fot = $channel->photo; 
$chanel_txt = $channel->text; 
$caption=$channel->caption;

//==================@API_KOD VS @API_KOD_GROUP ======================//Date 


$time_s = strtotime("2 hour");

$date_d = date("d", $time_s);
$date_m = date("m", $time_s);
$date_y = date("Y", $time_s);
$date_n = date("N", $time_s);

//soat
$time_h = date("H", $time_s);
$time_i = date("i", $time_s);
$time_c = date("s", $time_s);
$time_b = date("B", $time_s);
$bugungi_kun  = mktime(0, 0, 0, $date_m, $date_d, $date_y);


//==================@API_KOD VS @API_KOD_GROUP ======================//Folde

@mkdir("$date_y");
@mkdir("$date_y/$date_m");
@mkdir("$date_y/$date_m/$date_d");
@mkdir('data');
@mkdir('lang');
@mkdir('user');
@mkdir('baza');
@mkdir('baza/alluser');
@mkdir('search');
@mkdir('download');
@mkdir('download/result');
@mkdir('edit');


//==================@API_KOD VS @API_KOD_GROUP ======================//Files

if($cty == 'private'){

//IDlar yozib olinadi
if (!file_exists("baza/alluser/$cid.id")) {
file_put_contents('baza/alluser/'.$cid.'.id', $first_name);
file_put_contents('baza/allmembers.id', "$cid\n", FILE_APPEND);
}
}


$uslang = file_get_contents("lang/$cid.lang");



if (!file_exists('temp.json')) {
    file_put_contents("temp.json", '{}');
}if (!file_exists('msgs.json')) {
    file_put_contents("msgs.json", '{"last":1}');
}

$temp = json_decode(file_get_contents('temp.json'),true);
$msg = json_decode(file_get_contents('msgs.json'),true);

//==================@API_KOD VS @API_KOD_GROUP ======================//Language

if ($message->photo or $message->document or $message->video or $message->voice or $message->audio) {
    $text = $message->caption;
}

$remove_keyboard = json_encode([
        	'remove_keyboard' => true
        ]);


$key1 = json_encode([
'inline_keyboard'=>[
[['text'=>"🇺🇿 O'zbekcha"],],
[['text'=>"🇷🇺 Русский"],['text'=>"🇬🇧 English"]],
]
]);
//==================@API_KOD VS @API_KOD_GROUP ======================//Code


//==================@API_KOD VS @API_KOD_GROUP ======================//DATA AUDIO
//==================@API_KOD VS @API_KOD_GROUP ======================//RAQAM QABUL QILUVCHI
//==================@API_KOD VS @API_KOD_GROUP ======================//AUDIO YUKLAB OLUVCHI


if(strpos($tx , '/false') !== false and admin_bot($cid) == "yes"){



$falen = strlen($tx);

$strlen = strlen(trim($tx))-6;
$xeze = substr(trim($tx),6, $strlen);
$uubn = trim($xeze);

$tito = explode(">", $uubn);

$titu = explode(">", file_get_contents('data/files.fal'));


if($falen == 6){
if(file_exists('data/files.fal')){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Bot statisticasi:
Barcha a'zolari: $titu[0]

O'zbeklar: $titu[1]
Ruslar: $titu[2]
Ingilizlar: $titu[3]
",
'parse_mode'=>'html',
]);




}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b> Son qiymatlari kiritilmagan
Namuna: /false all>uz>ru>en </b>",
'parse_mode'=>'html',
]);

}
}
if($falen > 14){
if(is_numeric($tito[0]) and is_numeric($tito[1]) and is_numeric($tito[2]) and is_numeric($tito[3])){


bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"
False statisticasining taxminiy ko'rinishi.

Bot statisticasi:
Barcha a'zolari: $tito[0]

O'zbeklar: $tito[1]
Ruslar: $tito[2]
Ingilizlar: $tito[3]

By : Azizbek Tog'ayev 
",
'parse_mode'=>'html',
]);
 file_put_contents('data/files.fal', $uubn);

}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"ERROR (XATO)!

Raqamlar kiriting 
",
'parse_mode'=>'html',
]);

}
}
}

//==================@API_KOD VS @API_KOD_GROUP ======================//AUDIO
//==================@API_KOD VS @API_KOD_GROUP ======================//NEW UPDATE
if(strpos($data , 'new_') !== false){
$rexp = explode("_", $data);

if($rexp[1] !== "0"){

$plusres = $rexp[1] + 15;
$minusres = $rexp[1] - 15;


$api = json_decode(file_get_contents("https://Azizbeks.xvest.ru/music/new.php?result=".$rexp[1]), true);


if(isset($api[2])){

bot('sendChatAction', [
'chat_id' =>$ccid,
'action' => 'typing',
]);
$tt = [];
foreach ($api as $key => $value) {
$name = htmlspecialchars_decode($value['name'], ENT_COMPAT);
$idd = $value['id'];

array_push($tt, [[ 'text'=>$name, 'callback_data'=>"music_$idd"],]);
}


array_push($tt, [[ 'text'=>"◀", 'callback_data'=>"new_$minusres"],[ 'text'=>"▶", 'callback_data'=>"new_$plusres"]]);



if(lang($ccid) == "uz"){


Bot('editmessagetext',[
 'chat_id'=>$ccid,
 'message_id'=>$cmid,
'text'=>"<b> 🔎 Eng so'ngi musiqalar </b>
➖➖➖➖➖➖➖➖➖➖", 'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($ccid) == "ru"){


Bot('editmessagetext',[
 'chat_id'=>$ccid,
 'message_id'=>$cmid,
'text'=>"<b> 🔎 Eng so'ngi musiqalar </b>
➖➖➖➖➖➖➖➖➖➖", 'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($ccid) == "en"){


Bot('editmessagetext',[
 'chat_id'=>$ccid,
 'message_id'=>$cmid,
'text'=>"<b> 🔎 Eng so'ngi musiqalar </b>
➖➖➖➖➖➖➖➖➖➖", 'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}

}else{
if(lang($ccid) == "uz"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Boshqa musiqa mavjud emas! ", 
        'show_alert'=>true, 
    ]);  
}elseif(lang($ccid) == "ru"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Boshqa musiqa mavjud emas! ", 
        'show_alert'=>true, 
    ]);  

}elseif(lang($ccid) == "en"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Boshqa musiqa mavjud emas! ", 
        'show_alert'=>true, 
    ]);  
}
}

}else{
if(lang($ccid) == "uz"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Siz birichi menyudasiz! ", 
        'show_alert'=>true, 
    ]);  
}elseif(lang($ccid) == "ru"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Siz birichi menyudasiz! ", 
        'show_alert'=>true, 
    ]);  
}elseif(lang($ccid) == "en"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Siz birichi menyudasiz! ", 
        'show_alert'=>true, 
    ]);  
}
}
}


//==================@API_KOD VS @API_KOD_GROUP ======================//NEW MUSIC
if($tx == "/top" or $tx == "/top" or $tx == "/Top"){
if(file_exists('search/'.$cid.'.ochil')){
file_get_contents("https://muzmo.org/new.php?start=0");
sleep(0.8);

bot('sendChatAction', [
'chat_id' =>$cid,
'action' => 'typing',
]);


$api = json_decode(file_get_contents("https://Azizbeks.xvest.ru/music/new.php?result=0"), true);
sleep(0.8);

if(!empty($api[0]['name'])){

bot('sendChatAction', [
'chat_id' =>$cid,
'action' => 'typing',
]);

$tt = [];
foreach ($api as $key => $value) {
$name = htmlspecialchars_decode($value['name'], ENT_COMPAT);
$idd = $value['id'];

array_push($tt, [[ 'text'=>$name, 'callback_data'=>"music_$idd"],]);
}


array_push($tt, [[ 'text'=>"◀", 'callback_data'=>"new_0"],[ 'text'=>"▶", 'callback_data'=>"new_14"]]);

if(lang($cid) == "uz"){


$a = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b> 🔎 Eng so'ngi musiqalar </b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($cid) == "ru"){


bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b> 🔎 Eng so'ngi musiqalar </b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($cid) == "en"){


bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b> 🔎 Eng so'ngi musiqalar </b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}




}
}



}

//==================@API_KOD VS @API_KOD_GROUP ======================//IKKINCHI QATOR

//==================@API_KOD VS @API_KOD_GROUP ======================//SEARCH MUSIC BUTTON TEXT

//==================@API_KOD VS @API_KOD_GROUP ======================//BACK BUTTON TEXT



if($tx == "/pic" and !empty($rtx) and admin_bot($cid) == "yes"){

$file = $rtx[count($rtx)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;


      file_put_contents('api_kod.jpg', file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$patch));
file_put_contents('phpmp3/api_kod.jpg', file_get_contents('https://api.telegram.org/file/bot'.API_KEY.'/'.$patch));

bot('sendphoto',[
        'chat_id'=>$cid,
        'photo'=> new CURLFile('api_kod.jpg'),        'caption'=>"Foto yuklandi",
'parse_mode'=>'html'
        ]);
 

}


if($tx == "/start" and empty(lang($cid))){
if($cty == 'private'){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"UZ Tilni tanlan 
RU ruschada tilni tanlang yozilsin
EN da ham shu",
'parse_mode'=>'html',
'reply_markup' =>$key1
]);

exit();

}
}



if($tx == "⚙ Sozlamalar"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Созламалар менюси ",
'parse_mode'=>'html',
'reply_markup' =>$sozlauz,
]);
}

if($tx == "⚙ Настройки"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Созламалар менюси",
'parse_mode'=>'html',
'reply_markup' =>$sozlaru,
]);

}

if($tx == "⚙ Settings"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Созламалар менюси",
'parse_mode'=>'html',
'reply_markup' =>$sozlaen,
]);

}

if($tx == "👅 Tilni tanlash"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>" Tilni tanlan",
'parse_mode'=>'html',
'reply_markup' =>$key1
]);
}

if($tx == "👅 Language"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>" Tilni tanlan",
'parse_mode'=>'html',
'reply_markup' =>$key1
]);

}

if($tx == "👅 Изменить язык"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>" Tilni tanlan",
'parse_mode'=>'html',
'reply_markup' =>$key1
]);
} 

if($data == "🇺🇿 O'zbekcha"){
@mkdir('lang/uz');
@unlink('lang/uz/'.$ccid.'.lang');
@unlink('lang/ru/'.$ccid.'.lang');
@unlink('lang/en/'.$ccid.'.lang');
bot('deleteMessage',[
         'chat_id'=>$ccid,
         'message_id'=>$ccmid,
         ]);
bot('sendMessage',[
'chat_id'=>$ccid,
'text'=>"$data tili tanlanildi",
'parse_mode'=>'html',
'reply_markup' =>$sozlamauz
]);
file_put_contents("lang/$ccid.lang", "uz");
file_put_contents("lang/uz/".$ccid.".lang", $data);
}

if($data == "🇷🇺 Русский"){
@mkdir('lang/ru');
@unlink('lang/uz/'.$ccid.'.lang');
@unlink('lang/ru/'.$ccid.'.lang');
@unlink('lang/en/'.$ccid.'.lang');
bot('deleteMessage',[
         'chat_id'=>$ccid,
         'message_id'=>$ccmid,
         ]);
bot('sendMessage',[
'chat_id'=>$ccid,
'text'=>"$data tili tanlanildi",
'parse_mode'=>'html',
'reply_markup' =>$sozlamaru
]);
file_put_contents("lang/$ccid.lang", "ru");
file_put_contents("lang/ru/".$ccid.".lang", $data);
}

if($data == "🇬🇧 English"){

@mkdir('lang/en');
@unlink('lang/uz/'.$ccid.'.lang');
@unlink('lang/ru/'.$ccid.'.lang');
@unlink('lang/en/'.$ccid.'.lang');
bot('deleteMessage',[
         'chat_id'=>$ccid,
         'message_id'=>$ccmid,
         ]);
bot('sendMessage',[
'chat_id'=>$ccid,
'text'=>"$data tili tanlanildi",
'parse_mode'=>'html',
'reply_markup' =>$sozlamaen
]);
file_put_contents("lang/$ccid.lang", "en");
file_put_contents("lang/en/".$ccid.".lang", $data);
}


//==================@API_KOD VS @API_KOD_GROUP ======================//DOWNLOAD MUSIC

if(strpos($data , 'down_') !== false){

$strlen = strlen(trim($data))-5;
$xeze = substr(trim($data),5, $strlen);
$uubn = trim($xeze);
$linkm = file_get_contents("download/$ccid/$uubn.file");
  

$getme = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getme"));
$music_text = file_get_contents('data/'.$ccid.'.text');

$user_bot = "@".$getme->result->username;

if(!empty($music_text)){
$userbot = $music_text;
}else{
$userbot = "@".$getme->result->username;
}

$json_api = file_get_contents("https://coder_doda-api.ru/api_getid3/index.php?music_url=http://muzmo.ru$linkm&cover_url=https://coder_doda-api.ru/music/.jpg&filename=$ccid.mp3&songname=".urlencode($ctext)."&artist=".urlencode($userbot)."&id=$ccid");


}



//==================@API_KOD VS @API_KOD_GROUP ======================//UPDATE TABLE CALLBLAKC QUERTY


if(strpos($data , 'update_') !== false){
$rexp = explode("_", $data);

if($rexp[1] !== "0"){

$plusres = $rexp[1] + 15;
$minusres = $rexp[1] - 15;


$texts = file_get_contents('search/'.$ccid.'.search');

$api = json_decode(file_get_contents('https://Azizbeks.xvest.ru/music/search.php?q='.urlencode($texts)."&result=".$rexp[1]), true);


if(isset($api[2])){

bot('sendChatAction', [
'chat_id' =>$ccid,
'action' => 'typing',
]);
$tt = [];
foreach ($api as $key => $value) {
$name = htmlspecialchars_decode($value['name'], ENT_COMPAT);
$idd = $value['id'];

array_push($tt, [[ 'text'=>$name, 'callback_data'=>"music_$idd"],]);
}


array_push($tt, [[ 'text'=>"◀", 'callback_data'=>"update_$minusres"],[ 'text'=>"▶", 'callback_data'=>"update_$plusres"]]);



if(lang($ccid) == "uz"){


Bot('editmessagetext',[
 'chat_id'=>$ccid,
 'message_id'=>$cmid,
'text'=>"<b> 🔎 Qidiruv natijasi!
📎 Quyidagi tugmachalardan kerakli musiqani tanlang.</b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($ccid) == "ru"){


Bot('editmessagetext',[
 'chat_id'=>$ccid,
 'message_id'=>$cmid,
'text'=>"<b> 🔎 Qidiruv natijasi!
📎 Quyidagi tugmachalardan kerakli musik tanlang.</b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($ccid) == "en"){


Bot('editmessagetext',[
 'chat_id'=>$ccid,
 'message_id'=>$cmid,
'text'=>"<b> 🔎 Qidiruv natijasi!
📎 Quyidagi tugmachalardan kerakli 🎬 music tanlang.</b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}

}else{
if(lang($ccid) == "uz"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Boshqa musiqa mavjud emas! ", 
        'show_alert'=>true, 
    ]);  
}elseif(lang($ccid) == "ru"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Boshqa musiqa mavjud emas! ", 
        'show_alert'=>true, 
    ]);  

}elseif(lang($ccid) == "en"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Boshqa musiqa mavjud emas! ", 
        'show_alert'=>true, 
    ]);  
}
}

}else{
if(lang($ccid) == "uz"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Siz birichi menyudasiz! ", 
        'show_alert'=>true, 
    ]);  
}elseif(lang($ccid) == "ru"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Siz birichi menyudasiz! ", 
        'show_alert'=>true, 
    ]);  
}elseif(lang($ccid) == "en"){
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Siz birichi menyudasiz! ", 
        'show_alert'=>true, 
    ]);  
}
}
}


//==================@API_KOD VS @API_KOD_GROUP ======================//MUSIC TIP

if(strpos($data , 'music_') !== false){
$strlen = strlen(trim($data))-6;
$xeze = substr(trim($data),6, $strlen);
$uubn = trim($xeze);

if(file_get_contents('http://muzmo.ru'.$uubn)){
sleep(0.5);
$api = json_decode(file_get_contents('https://Azizbeks.xvest.ru/music/download.php?id='.$uubn), true);  //@API_KOD GA TASHLANADI KOD MANBASINI O'ZGARTIRISH MAN ETULADI :)
$nomi = json_decode(file_get_contents('https://Azizbeks.xvest.ru/music/info.php?id='.$uubn), true);

if(!empty($api["link"])){

bot('sendaudio',[
 'chat_id'=>$ccid,
 'audio'=>$api["link"],
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"❤️",'callback_data'=>"like_".$uubn."like_".$nomi],['text'=>"❌",'callback_data'=>"delete"]['text'=>"💔",'callback_data'=>"diz_".$uubn."diz_".$nomi]],
]
]),
]);
  
}
}
}
if(strpos($data , 'like_') !== false){
	$p = explode("like_",$data);
	$ss=file_get_contents("my/$ccid.db");
	file_put_contents("my/$ccid.db","[".$p[2]."+".$p[1]."]".$ss.");
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Shahsiy musiqalaringizga qoshib qo'ydim!", 
        'show_alert'=>false, 
    ]); 
    }
    if(strpos($data , 'diz_') !== false){
	$p = explode("diz_",$data);
	$ss=file_get_contents("my/$ccid.db");
	$bj =str_replace("[".$p[2]."+".$p[1]."]".$ss.","",$ss);
	file_put_contents("my/$ccid.db","$bj")
bot('answerCallbackQuery',[ 
        'callback_query_id'=>$qid, 
        'text'=>"Shahsiy tarkibdan olindi!", 
        'show_alert'=>false, 
    ]); 
    }
//==================@API_KOD VS @API_KOD_GROUP ======================//SEARCH MUSIC 

if(isset($message->text) and !$entities and mantililar($tx) == "no"){
 

if(lang($cid) == "uz"){


$send_id = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b> 🖥 Qidirilmoqda...: $tx 🔍
⏱ Yaqin daqiqalar ichida qidiruv natijasi sizga taqdim etamiz!😊

 </b> ",
'parse_mode'=>'html',
])->result->message_id;


}elseif(lang($cid) == "ru"){


$send_id = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b> 🖥 Qidirilmoqda...: $tx 🔍
⏱ Yaqin daqiqalar ichida qidiruv natijasi sizga taqdim etamiz!😊

 </b> ",
'parse_mode'=>'html',
])->result->message_id;


}elseif(lang($cid) == "en"){


$send_id = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b> 🖥 Qidirilmoqda...: $tx 🔍
⏱ Yaqin daqiqalar ichida qidiruv natijasi sizga taqdim etamiz!😊

 </b> ",
'parse_mode'=>'html',
])->result->message_id;



}



$api = json_decode(file_get_contents('https://Azizbeks.xvest.ru/music/search.php?q='.urlencode($message->text)."&result=0"), true);
sleep(0.9);

if(!empty($api[0]['name'])){

file_put_contents('search/'.$cid.'.search', trim($tx));

bot('sendChatAction', [
'chat_id' =>$cid,
'action' => 'typing',
]);

$tt = [];
foreach ($api as $key => $value) {
$name = htmlspecialchars_decode($value['name'], ENT_COMPAT);
$idd = $value['id'];

array_push($tt, [[ 'text'=>$name, 'callback_data'=>"music_$idd"],]);
}


array_push($tt, [[ 'text'=>"◀", 'callback_data'=>"update_0"],[ 'text'=>"▶", 'callback_data'=>"update_14"]]);

if(empty($cid)){
$oxex = explode("|", trim(file_get_contents('search/oxirgisi.mid')));

$cid = $oxex[0];
$send_id = $oxex[1];

unlink('search/oxirgisi.mid');
}



if(lang($cid) == "uz"){


$a = Bot('editmessagetext',[
 'chat_id'=>$cid,
 'message_id'=>$send_id,
'text'=>"<b> 🔎 Qidiruv natijasi!
📎 Quyidagi tugmachalardan kerakli musiqani tanlang.</b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($cid) == "ru"){


Bot('editmessagetext',[
 'chat_id'=>$cid,
 'message_id'=>$send_id,
'text'=>"<b> 🔎 Qidiruv natijasi!
📎 Quyidagi tugmachalardan kerakli musik tanlang.</b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}elseif(lang($cid) == "en"){


Bot('editmessagetext',[
 'chat_id'=>$cid,
 'message_id'=>$send_id,
'text'=>"<b> 🔎 Qidiruv natijasi!
📎 Quyidagi tugmachalardan kerakli 🎬 music tanlang.</b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$tt
]),
]);


}


}else{



if(lang($cid) == "uz"){



$aa = Bot('editmessagetext',[
 'chat_id'=>$cid,
 'message_id'=>$send_id,
'text'=>" 🔎 Qidiruv natijasiz yakunlandi! ☹️
🛑 Hech narsa topilmadi!",
'parse_mode'=>'html',
]);



}elseif(lang($cid) == "ru"){

Bot('editmessagetext',[
 'chat_id'=>$cid,
 'message_id'=>$send_id,
'text'=>"🔎 Qidiruv natijasiz yakunlandi! ☹️
🛑 Hech narsa topilmadi!",
'parse_mode'=>'html',
]);



}elseif(lang($cid) == "en"){


Bot('editmessagetext',[
 'chat_id'=>$cid,
 'message_id'=>$send_id,
'text'=>"🔎 Qidiruv natijasiz yakunlandi! ☹️
🛑 Hech narsa topilmadi!",
'parse_mode'=>'html',
]);


}
}
}
}



//==================@API_KOD VS @API_KOD_GROUP ======================//START TWO
if($tx == "/my" ){
if($cty == 'private'){
if(file_exists("my/$cid.db")){
$hf = trim(file_get_contents("my/$cid.db"));
preg_match_all("|\[(.*)\]|U",$hf,$ouvt);
$keyboard2 = [];
foreach($ouvt[1] as $ouut){
$ot = explode("+",$ouut);
array_push($keyboard2,[["callback_data"=>"music_".$ot[1], "text"=>"$ot[0]"]]);
}
array_push($keyboard2, [[ 'text'=>"❌", 'callback_data'=>"delete"]]);
bot('sendMessage',[
 'chat_id'=>$cid,
'text'=>"<b> Sizning shaxshiy musiqalaringiz.</b>
➖➖➖➖➖➖➖➖➖➖",
'parse_mode'=>'html',
'reply_markup' => json_encode(
['inline_keyboard' =>
$keyboard2
]),
]);
}else{
	bot('sendMessage',[
 'chat_id'=>$cid,
'text'=>"<b> Sizning shaxshiy musiqalaringiz mavjud emas.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"❌",'callback_data'=>"delete"]],
]
]),
]);
}
}
}
if($tx == "/start" and !empty($uslang)){
if($cty == 'private'){

if($uslang == "uz"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"   ❄ <b>Botga xush kelibsiz</b> 🎵",
'parse_mode'=>'html',
'reply_markup' =>$sozlamauz
]);



}elseif($uslang == "ru"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"   xush kelibsiz ",
'parse_mode'=>'html',
'reply_markup' =>$sozlamaru
]);


}elseif($uslang == "en"){
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"libsiz",
'parse_mode'=>'html',
'reply_markup' =>$sozlamaen
]);


}
unlink('edit/'.$cid.'.addduration');

unlink('edit/'.$cid.'.qabul');

unlink('data/'.$cid.'.ochish');

unlink('search/'.$cid.'.ochil');
}
}


//==================@API_KOD VS @API_KOD_GROUP ======================//Language MANUAL







//==================@API_KOD VS @API_KOD_GROUP ======================//STATIC



if($tx == "/static"){
if($cid == $admin_list[1] or $cid == $admin_list[0]){
$staticmem = trim(file_get_contents('baza/allmembers.id'));

$stex = count(explode("\n", $staticmem));
$globuz = count(glob("lang/uz/*.lang"));
$globru = count(glob("lang/ru/*.lang"));
$globen = count(glob("lang/en/*.lang"));


if($uslang == "uz"){

$a = bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Bot statisticasi:
Barcha a'zolari: $stex

O'zbeklar: $globuz
Ruslar: $globru
Ingilizlar: $globen
",
'parse_mode'=>'html',
]);


}elseif($uslang == "ru"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Статистика Бот
Все потписчик: $stex

O'zbeklar: $globuz
Ruslar: $globru
Ingilizlar: $globen
",
'parse_mode'=>'html',
]);

}elseif($uslang == "en"){

bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"Statistica Bot 

All members: $stex

O'zbeklar: $globuz
Ruslar: $globru
Ingilizlar: $globen
",
'parse_mode'=>'html',
]);

}

}
}



//==================@API_KOD VS @API_KOD_GROUP ======================//POST MAKER FUNCTION

$reply_markup = json_encode($msg[$msg['last']]['reply_markup']);

if($data == 'uzb_keyboard_audio'){
foreach(glob("lang/uz/*.lang") as $key => $values){
$idlar = basename($values, ".lang");

        

$resultif = bot('sendaudio',[
            'chat_id'=>$idlar,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_keyboard_audio'){
foreach(glob("lang/ru/*.lang") as $key => $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendaudio',[
            'chat_id'=>$idlar,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_keyboard_audio'){
foreach(glob("lang/en/*.lang") as $key => $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendaudio',[
            'chat_id'=>$idlar,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_keyboard_audio'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $key => $values){
$resultif = bot('sendaudio',[
            'chat_id'=>$values,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}




//==================@API_KOD VS @API_KOD_GROUP ======================//VIDEO ODDIY

if($data == 'uzb_keyboard_video'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");

        
        
        

$resultif = bot('sendvideo',[
            'chat_id'=>$idlar,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

 
if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_keyboard_video'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvideo',[
            'chat_id'=>$idlar,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_keyboard_video'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvideo',[
            'chat_id'=>$idlar,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_keyboard_video'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendvideo',[
            'chat_id'=>$values,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}



//==================@API_KOD VS @API_KOD_GROUP ======================//PHOTO ODDIY

if($data == 'uzb_keyboard_photo'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");

$resultif = bot('sendPhoto',[
            'chat_id'=>$idlar,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_keyboard_photo'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendPhoto',[
            'chat_id'=>$idlar,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_keyboard_photo'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendPhoto',[
            'chat_id'=>$idlar,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_keyboard_photo'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendPhoto',[
            'chat_id'=>$values,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 
}

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


//==================@API_KOD VS @API_KOD_GROUP ======================//TEXT ODDIY

if($data == 'uzb_keyboard_text'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendMessage',[
            'chat_id'=>$idlar,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_keyboard_text'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendMessage',[
            'chat_id'=>$idlar,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_keyboard_text'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendMessage',[
            'chat_id'=>$idlar,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_keyboard_text'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendMessage',[
            'chat_id'=>$values,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}

//==================@API_KOD VS @API_KOD_GROUP ======================//VOICE ODDIY

if($data == 'uzb_keyboard_voice'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");

$resultif = bot('sendvoice',[
            'chat_id'=>$idlar,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);


        
if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_keyboard_voice'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvoice',[
            'chat_id'=>$idlar,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_keyboard_voice'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvoice',[
            'chat_id'=>$idlar,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_keyboard_voice'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendvoice',[
            'chat_id'=>$values,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
'reply_markup'=>($reply_markup)
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 
}

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}



 
//==================@API_KOD VS @API_KOD_GROUP ======================//MATN YUBORISH SO'ROVI

if ($data == "yes") {
    $temp[$ccid]['mode'] = 'keyboard';
    file_put_contents('temp.json', json_encode($temp));
    bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
        'text'=>"• Bu kabi tugmalar ro'yxatini yuboring.

Matn = havola
Matn = havola, matn = havola
Matn = havola, matn = havola, matn = havola

Misol.
matn = t.me
matn = t.me, matn = t.me
matn = t.me, matn = t.me, matn = t.me"
        ]);
}

//==================@API_KOD VS @API_KOD_GROUP ======================//YUBORILGAN MATNI QABULQILADI


if ($tx != '/start' and $temp[$cid]['mode']=='keyboard') {
    $i=0;
    $keyboard = [];
    $keyboard["inline_keyboard"] = [];
    $rows = explode("\n",$tx);
        foreach($rows as $row){
            $j=0;
            $keyboard["inline_keyboard"][$i]=[];
            $bottons = explode(",",$row);
                foreach($bottons as $botton){
                    $data = explode("=",$botton."=");
                    $Ibotton = ["text" => trim($data[0]), "url" => trim($data[1])];
                    $keyboard["inline_keyboard"][$i][$j] = $Ibotton;
                    $j++;
                }
                $i++;
            }
    bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>'Bir oz kutib turing.'
        ]);
    $reply_markup = json_encode($keyboard);

//==================@API_KOD VS @API_KOD_GROUP ======================//MATNLI KEYBOARD

    if ($temp[$cid]['type'] == 'text') {
        $msg['last'] = $msg['last'] + 1;
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>$temp[$cid]['text'],
        'reply_markup'=>($reply_markup)
        ]);
    bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"Postning taxminiy ko'rinishi",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_keyboard_text'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_keyboard_text'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_keyboard_text'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_keyboard_text'],],
            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    
    $msg[$msg['last']]['text'] = $temp[$cid]['text'];
    $msg[$msg['last']]['type'] = 'text_keyboard';
    $msg[$msg['last']]['reply_markup'] = $keyboard;
    }

//==================@API_KOD VS @API_KOD_GROUP ======================//PHOTOLI KEYBOARD

    if ($temp[$cid]['type'] == 'photo') {
        $msg['last'] = $msg['last'] + 1;
        $ab = bot('sendPhoto',[
        'chat_id'=>$cid,
          'photo'=>$temp[$cid]['file_id'],
        'caption'=>$temp[$cid]['caption'],
        'parse_mode'=>'html',
        'reply_markup'=>($reply_markup)
        ]);

    bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"Postning taxminiy ko'rinishi",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_keyboard_photo'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_keyboard_photo'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_keyboard_photo'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_keyboard_photo'],],
            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    
        $msg[$msg['last']]['file_id'] = $temp[$cid]['file_id'];
        $msg[$msg['last']]['caption'] = $temp[$cid]['caption'];
    $msg[$msg['last']]['type'] = 'photo_keyboard';
    $msg[$msg['last']]['reply_markup'] = $keyboard;
    }
   
//==================@API_KOD VS @API_KOD_GROUP ======================//AUDIO KEYBOARD

    if ($temp[$cid]['type'] == 'audio') {
        $msg['last'] = $msg['last'] + 1;
      $ab =  bot('sendaudio',[
        'chat_id'=>$cid,
        'audio'=>$temp[$cid]['file_id'],
        'caption'=>$temp[$cid]['caption'],
        'parse_mode'=>'html',
        'reply_markup'=>($reply_markup)
        ]);

    bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"Postning taxminiy ko'rinishi",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_keyboard_audio'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_keyboard_audio'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_keyboard_audio'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_keyboard_audio'],],
            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    
        $msg[$msg['last']]['file_id'] = $temp[$cid]['file_id'];
        $msg[$msg['last']]['caption'] = $temp[$cid]['caption'];
    $msg[$msg['last']]['type'] = 'audio_keyboard';
    $msg[$msg['last']]['reply_markup'] = $keyboard;
    }

//==================@API_KOD VS @API_KOD_GROUP ======================//VIDEO KEYBOARD

    if ($temp[$cid]['type'] == 'video') {
        $msg['last'] = $msg['last'] + 1;
        bot('sendvideo',[
        'chat_id'=>$cid,
        'video'=>$temp[$cid]['file_id'],
        'caption'=>$temp[$cid]['caption'],
        'parse_mode'=>'html',
        'reply_markup'=>($reply_markup)
        ]);
    bot('sendMessage',[
            'chat_id'=>$cid,
         'text'=>"Postning taxminiy ko'rinishi",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_keyboard_video'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_keyboard_video'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_keyboard_video'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_keyboard_video'],],
            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    
        $msg[$msg['last']]['file_id'] = $temp[$cid]['file_id'];
        $msg[$msg['last']]['caption'] = $temp[$cid]['caption'];
    $msg[$msg['last']]['type'] = 'video_keyboard';
    $msg[$msg['last']]['reply_markup'] = $keyboard;
    }

    if ($temp[$cid]['type'] == 'voice') {
        $msg['last'] = $msg['last'] + 1;
        bot('sendvoice',[
        'chat_id'=>$cid,
        'voice'=>$temp[$cid]['file_id'],
        'caption'=>$temp[$cid]['caption'],
        'parse_mode'=>'html',
        'reply_markup'=>($reply_markup)
        ]);
    bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>$bot.' '.$msg['last'],
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_keyboard_voice'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_keyboard_voice'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_keyboard_voice'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_keyboard_voice'],],
            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    
        $msg[$msg['last']]['file_id'] = $temp[$cid]['file_id'];
        $msg[$msg['last']]['caption'] = $temp[$cid]['caption'];
    $msg[$msg['last']]['type'] = 'voice_keyboard';
    $msg[$msg['last']]['reply_markup'] = $keyboard;
    }
    $temp[$cid]['type'] = null;
    $temp[$cid]['mode'] = null;
    $temp[$cid]['text'] = null;  
    $temp[$cid]['caption'] = null;
    $temp[$cid]['file_id']= null;
    file_put_contents('temp.json', json_encode($temp));
    file_put_contents("msgs.json", json_encode($msg));
}


//==================@API_KOD VS @API_KOD_GROUP ======================//AUDIO ODDIY

if($data == 'uzb_audio'){
foreach(glob("lang/uz/*.lang") as $key => $values){
$idlar = basename($values, ".lang");

        

$resultif = bot('sendaudio',[
            'chat_id'=>$idlar,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_audio'){
foreach(glob("lang/ru/*.lang") as $key => $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendaudio',[
            'chat_id'=>$idlar,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_audio'){
foreach(glob("lang/en/*.lang") as $key => $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendaudio',[
            'chat_id'=>$idlar,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_audio'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $key => $values){
$resultif = bot('sendaudio',[
            'chat_id'=>$values,
            'audio'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}




//==================@API_KOD VS @API_KOD_GROUP ======================//VIDEO ODDIY

if($data == 'uzb_video'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");

        
        
        

$resultif = bot('sendvideo',[
            'chat_id'=>$idlar,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

 
if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_video'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvideo',[
            'chat_id'=>$idlar,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_video'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvideo',[
            'chat_id'=>$idlar,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_video'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendvideo',[
            'chat_id'=>$values,
            'video'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}



//==================@API_KOD VS @API_KOD_GROUP ======================//PHOTO ODDIY

if($data == 'uzb_photo'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");

$resultif = bot('sendPhoto',[
            'chat_id'=>$idlar,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_photo'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendPhoto',[
            'chat_id'=>$idlar,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_photo'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendPhoto',[
            'chat_id'=>$idlar,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_photo'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendPhoto',[
            'chat_id'=>$values,
            'photo'=>$msg[$msg['last']]['file_id'],   
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 
}

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


//==================@API_KOD VS @API_KOD_GROUP ======================//TEXT ODDIY

if($data == 'uzb_text'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendMessage',[
            'chat_id'=>$idlar,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_text'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendMessage',[
            'chat_id'=>$idlar,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_text'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendMessage',[
            'chat_id'=>$idlar,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_text'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendMessage',[
            'chat_id'=>$values,
            'text'=>$msg[$msg['last']]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 }

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}

//==================@API_KOD VS @API_KOD_GROUP ======================//VOICE ODDIY

if($data == 'uzb_voice'){
foreach(glob("lang/uz/*.lang") as $values){
$idlar = basename($values, ".lang");

$resultif = bot('sendvoice',[
            'chat_id'=>$idlar,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);


        
if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi",
            ]);

}


if($data == 'rus_voice'){
foreach(glob("lang/ru/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvoice',[
            'chat_id'=>$idlar,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}


if($data == 'eng_voice'){
foreach(glob("lang/en/*.lang") as $values){
$idlar = basename($values, ".lang");
$resultif = bot('sendvoice',[
            'chat_id'=>$idlar,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);


if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
}
bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);
}


if($data == 'allmembers_voice'){
$tarqat = explode("\n", trim(file_get_contents('baza/allmembers.id')));

foreach($tarqat as $values){
$resultif = bot('sendvoice',[
            'chat_id'=>$values,
            'voice'=>$msg[$msg['last']]['file_id'],
            'caption'=>$msg[$msg['last']]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);

if($resultif->ok == false){
}else{
$yuborildi = $i++;
}
 
}

bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
            'text'=>"Yuborildi: $yuborildi
",
            ]);

}



//==================@API_KOD VS @API_KOD_GROUP ======================//SHAFOF TUGMALAR YO'Q


if ($data == 'no') {
    bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
        'text'=>'Bir oz kutib turing.'
        ]);

    if ($temp[$ccid]['type'] == 'text') {
        $msg[$msg['last'] + 1]['type'] = 'text';
        $msg[$msg['last'] + 1]['text'] = $temp[$ccid]['text'];
        bot('sendMessage',[
            'chat_id'=>$ccid,
            'text'=>$temp[$ccid]['text'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);
        $msg['last'] = $msg['last'] + 1;
        bot('sendMessage',[
            'chat_id'=>$ccid,
            'text'=>"Matn tayor quyidagi knopkalarni tanlan",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_text'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_text'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_text'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_text'],],

            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    }
    if ($temp[$ccid]['type'] == 'photo') {
        $msg[$msg['last'] + 1]['type'] = 'photo';
        $msg[$msg['last'] + 1]['file_id'] = $temp[$ccid]['file_id'];
        $msg[$msg['last'] + 1]['caption'] = $temp[$ccid]['caption'];
        bot('sendPhoto',[
            'chat_id'=>$ccid,
            'photo'=>$temp[$ccid]['file_id'],   
            'caption'=>$temp[$ccid]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);
        $msg['last'] = $msg['last'] + 1;
        bot('sendMessage',[
            'chat_id'=>$ccid,
            'text'=>"Foto post tayor",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_photo'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_photo'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_photo'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_photo'],],

            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    }
    if ($temp[$ccid]['type'] == 'video') {
        $msg[$msg['last'] + 1]['type'] = 'video';
        $msg[$msg['last'] + 1]['file_id'] = $temp[$ccid]['file_id'];
        $msg[$msg['last'] + 1]['caption'] = $temp[$ccid]['caption'];
        bot('sendvideo',[
            'chat_id'=>$ccid,
            'video'=>$temp[$ccid]['file_id'],
            'caption'=>$temp[$ccid]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);
        $msg['last'] = $msg['last'] + 1;
        bot('sendMessage',[
            'chat_id'=>$ccid,
            'text'=>"Video post tayor ",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_video'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_video'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_video'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_video'],],

            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    }
    if ($temp[$ccid]['type'] == 'audio') {
        $msg[$msg['last'] + 1]['type'] = 'audio';
        $msg[$msg['last'] + 1]['file_id'] = $temp[$ccid]['file_id'];
        $msg[$msg['last'] + 1]['caption'] = $temp[$ccid]['caption'];
        bot('sendaudio',[
            'chat_id'=>$ccid,
            'audio'=>$temp[$ccid]['file_id'],
            'caption'=>$temp[$ccid]['caption'],
            'parse_mode'=>'html',
'disable_web_page_preview' => true,
            ]);
        $msg['last'] = $msg['last'] + 1;
        bot('sendMessage',[
            'chat_id'=>$ccid,
            'text'=>"Audio post tayor",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_audio'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_audio'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_audio'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_auido'],],

            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    }
   
    if ($temp[$ccid]['type'] == 'voice') {
        $msg[$msg['last'] + 1]['type'] = 'voice';
        $msg[$msg['last'] + 1]['file_id'] = $temp[$ccid]['file_id'];
        $msg[$msg['last'] + 1]['caption'] = $temp[$ccid]['caption'];
        bot('sendvoice',[
            'chat_id'=>$ccid,
            'voice'=>$temp[$ccid]['file_id'],
            'caption'=>$temp[$ccid]['caption'],
            'parse_mode'=>'html'
            ]);
        $msg['last'] = $msg['last'] + 1;
        bot('sendMessage',[
            'chat_id'=>$ccid,
            'text'=>"Postning taxminiy ko'rinishi tayor",
            'parse_mode'=>'html',
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>"Barchaga yuborish",'callback_data'=>'allmembers_voice'],],
[['text'=>"O'zbek auditoriyasiga yuborish",'callback_data'=>'uzb_voice'],],
[['text'=>"Rus auditoriyasiga yuborish ",'callback_data'=>'rus_voice'],],
[['text'=>"English auditoriyasiga yuborish",'callback_data'=>'eng_voice'],],
            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']]]])
            ]);
    }


    $temp[$ccid]['type'] = null;
    $temp[$ccid]['mode'] = null;
    $temp[$ccid]['text'] = null;  
    $temp[$ccid]['caption'] = null;
    $temp[$ccid]['file_id']= null;
    file_put_contents('temp.json', json_encode($temp));
    file_put_contents('msgs.json', json_encode($msg));
}


//==================@API_KOD VS @API_KOD_GROUP ======================//TEXT YUKLASH

if ($temp[$cid]['mode'] == 'head') {
    if ($message->text){

        $temp[$cid]['type'] = 'text';
        $temp[$cid]['text'] = $tx;

        bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"- Saqlandi, shaffof tugmalar qo'shishni xohlaysizmi?",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [['text'=>"Ha",'callback_data'=>'yes'],['text'=>"Yo'q",'callback_data'=>"no"]]
                ]
                ])
            ]);

        $temp[$cid]['mode'] = null;
    file_put_contents('temp.json', json_encode($temp));
    }

//==================@API_KOD VS @API_KOD_GROUP ======================//FOTO YUKLANSIN

    if ($message->photo) {

$con6 = $message->photo;
        $temp[$cid]['type'] = 'photo';
        $temp[$cid]['caption'] = $text;
        $temp[$cid]['file_id'] = $message->photo[count($con6)-1]->file_id;

        bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"- Saqlandi, shaffof tugmalar qo'shishni xohlaysizmi?",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [['text'=>"Ha",'callback_data'=>'yes'],['text'=>"Yo'q",'callback_data'=>"no"]]
                ]
                ])
            ]);
        $temp[$cid]['mode'] = null;
    file_put_contents('temp.json', json_encode($temp));    
    }

//==================@API_KOD VS @API_KOD_GROUP ======================//VIDEO YUKLASH

    if ($message->video) {
        $temp[$cid]['type'] = 'video';
        $temp[$cid]['caption'] = $text;
        $temp[$cid]['file_id'] = $message->video->file_id;
        bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"- Saqlandi, shaffof tugmalar qo'shishni xohlaysizmi?",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [['text'=>"Ha",'callback_data'=>'yes'],['text'=>"Yo'q",'callback_data'=>"no"]]
                ]
                ])
            ]);
        $temp[$cid]['mode'] = null;
    file_put_contents('temp.json', json_encode($temp));    
    }


        


//==================@API_KOD VS @API_KOD_GROUP ======================//AUDIO YUKLASH

    if ($message->audio) {
        $temp[$cid]['type'] = 'audio';
        $temp[$cid]['caption'] = $text;
        $temp[$cid]['file_id'] = $message->audio->file_id;
        bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"- Saqlandi, shaffof tugmalar qo'shishni xohlaysizmi?",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [['text'=>"Ha",'callback_data'=>'yes'],['text'=>"Yo'q",'callback_data'=>"no"]]
                ]
                ])
            ]);
        $temp[$cid]['mode'] = null;
    file_put_contents('temp.json', json_encode($temp));    
    }



}


//==================@API_KOD VS @API_KOD_GROUP ======================//VOICE GOLOS YUKLASH

    if ($message->voice) {
        $temp[$cid]['type'] = 'voice';
        $temp[$cid]['caption'] = $text;
        $temp[$cid]['file_id'] = $message->voice->file_id;
        bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>"- Saqlandi, shaffof tugmalar qo'shishni xohlaysizmi?",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [['text'=>"Ha",'callback_data'=>'yes'],['text'=>"Yo'q",'callback_data'=>"no"]]
                ]
                ])
            ]);
        $temp[$cid]['mode'] = null;
    file_put_contents('temp.json', json_encode($temp));    
    }

//==================@API_KOD VS @API_KOD_GROUP ======================//POST YARATISHGA KIRISH

if ($data == 'cr'){
$temp[$ccid]['mode'] = 'head';

    bot('editMessageText',[
        'chat_id'=>$ccid,
        'message_id'=>$cmid,
        'text'=>"📝 Sarlavhani Yuboring,
🖌 Sarlavha - Matnli xabar, Rasm, Video, Audio bo'lishi mumkin."
        ]);


         file_put_contents('temp.json', json_encode($temp));
unlink('search/'.$ccid.'.ochil');
}

//==================@API_KOD VS @API_KOD_GROUP ======================//ADMIN BUYRUG'I

if($tx == "/admin" and admin_bot($cid) == "yes"){

 bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"👮‍♀️ Assalom Alaykum!
🤖 Admin bu bo'limda post yaratasiz",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>'📝 Yangi Post Yasash','callback_data'=>'cr']],
]
 ]),
        ]);

}






//==================@API_KOD VS @API_KOD_GROUP ======================//End

?>