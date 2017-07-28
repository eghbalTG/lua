i<?php // TOKEN AND MOD
define('API_KEY','409338011:AAHn8Ldl3RVpGwOvCaVmM6ZDpZs2TgyPmUg');
$mod = '185456746';
date_default_timezone_set('Asia/Tehran');
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function Pass($length = 8) {
    $vmsString = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@_';
    return substr(str_shuffle($vmsString),0,$length);
}
function Msg($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
	function dlt($chat_id,$message_id){
	  bot('deletemessage',[
	      'chat_id' =>$chat_id,
	      'message_id'=>$message_id])  ;
	}
function FWD($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
	
function pic($chatid,$photo,$keyboard,$caption){
	bot('SendPhoto',[
	'chat_id'=>$chatid,
	'photo'=>$photo,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	//UPDATE
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$txt = $update->callback_query->message->text;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$text = $update->message->text;
$message_id = $update->message->message_id;
$stickerid = $update->message->sticker->thumb->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo) - 1]->file_id;
$musicid = $update->message->audio->file_id;
$caption = $update->message->caption;
if($caption == true){$text = $caption;}
file_put_contents("up.txt",file_get_contents("php://input"));
if($text == true){
    $cd = $chat_id;
    $fd = $from_id;
    $msg_id = $message_id;
}
if($data == true){
    $cd = $chatid;
    $fd = $fromid;
    $msg_id = $messageid;
}
//config
Bot('sendchataction',[
    'chat_id'=>$cd,
    'action'=>'typing']);
    //SHARE INLINE
    	//==========
if($update->inline_query->from->id == true){
    $in_id = $update->inline_query->from->id;
    $coin = file_get_contents("user/$in_id/coin.txt");
    $vuday = file_get_contents("user/$in_id/vuday.txt");
    if($vuday == null){$vuday = 0;}
    if($coin == null){$coin = 0;}
bot('answerInlineQuery', [
        'inline_query_id' => $update->inline_query->id,
        'cache_time'=>0,
        'results' => json_encode([[
            'type' => 'photo',
            'photo_url'=>'http://uupload.ir/files/z3we_nex_logo.jpg',
            'thumb_url'=>'https://telegram.me',
            'id' => base64_encode(rand(2,55)),
            'title' => "اشتراک لینک دعوت",
            'description'=>'test',
            'caption'=>'caption',
            'photo'=>'AgADBAADiagxG8lo2FMTGHoAAUVK1nDF5bwZAASKsOcJvCrleonGAwABAg',
            'reply_markup'=>[
'inline_keyboard'=>[
    [['text'=>'👈ورود به ربات ویوگیر👉','url'=>'https://telegram.me/VuGirbot?start='.$in_id]]]]
        ],[
            'type' => 'article',
            'thumb_url'=>"https://mxpro.ir/Bot/VB/admin/inf.png",
            'id' => base64_encode(rand(55,555)),
            'title' => "اشتراک مشخصات",
            'input_message_content' => ['parse_mode' => 'HTML', 'message_text' => "🆔شناسه شما : $in_id
💰تعداد سکه : $coin
👀تعداد بازدید امروز : $vuday"],
        ],])]);}
//SETTED NAME BUTTON
$bgetcoin = '💰جمع آوری سکه رایگان💰';
$bprice = 'موجودی💰';
$breq = '📮ثبت تبلیغ';
$bcutcoin = 'انتقال سکه🔃';
$breqlist = '📊پیگیری‌سفارش';
$bshop = 'فروشگاه🛍';
$bsup = 'پشتیبانی👨‍🚀';
$bhelp = '❓راهنما';
$bupvu = '📫 ارتقا سفارش قبلی 📊';
$bnew = '📝 ثبت تبلیغ جدید 📬';
$bback = 'برگشت به منوی اصلی 🔙';
$breqoff = '🛑لغو تبلیغ و پس گرفتن سکه🛑';
$backmod = 'بازگشت';
$bview = '👀دیدن تبلیغ👀';
$binv = 'معرفی👥';
$bday = 'سکه روزانه💰';
$bback2 = 'انصراف';
//AND LIST BUTTON
$b_coin = json_encode(['keyboard'=>[
    [['text'=>$bview]],
[['text'=>$binv],['text'=>$bday]],
[['text'=>$bback]],
],'resize_keyboard'=>true]);
$b_menu = json_encode(['keyboard'=>[
[['text'=>"$bgetcoin"]],
[['text'=>"$bprice"],['text'=>"$breq"]],
[['text'=>"$bshop"],['text'=>"$breqlist"]],
[['text'=>"$bsup"],['text'=>"$bhelp"]],
],'resize_keyboard'=>true]);
$b_new = json_encode(['keyboard'=>[
    [['text'=>$bnew]],
    [['text'=>$bupvu]],
    [['text'=>$breqoff]],
    [['text'=>$bback]],
],'resize_keyboard'=>true]);
$b_back = json_encode(['keyboard'=>[
    [['text'=>$bback]],
],'resize_keyboard'=>true]);
$b_back2 = json_encode(['keyboard'=>[
    [['text'=>$bback2]],
],'resize_keyboard'=>true]);
$mod_panel = json_encode(['keyboard'=>[
],'resize_keyboard'=>true]);
//CHANNEL IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
$channel = '@VuGir';
$channel_ads = '@VuGirADS';
$channel_all = '-1001104345100';
//MOD IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
$stats = file_get_contents("mod/stats.txt");
if($stats == null){
mkdir("ads");
mkdir("ads/time");
mkdir("ads/rep");
mkdir("ads/from");
mkdir("ads/msg id");
mkdir("ads/get");
mkdir("ads/tedad");
mkdir("ads/show id");
mkdir("mod");
mkdir("user");
file_put_contents("mod/stats.txt",185456746);
}
$helptxt = file_get_contents("mod/help.txt");
$block = file_get_contents("mod/block.txt");
//FILE IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
$coin = file_get_contents("user/$fd/coin.txt");
$com = file_get_contents("user/$fd/com.txt");
$sav1 = file_get_contents("user/$fd/sav1.txt");
$sav2 = file_get_contents("user/$fd/sav2.txt");
$inv = file_get_contents("user/$fd/inv.txt");
$invate = file_get_contents("user/$fd/invate.txt");
$allvu = file_get_contents("user/$fd/allvu.txt");
$dayvu = file_get_contents("user/$fd/dayvu.txt");
$history = file_get_contents("user/$fd/history.txt");
//
if(strpos("$stats","$fd") === false){
    file_put_contents("mod/stats.txt","$fd\n$stats");
mkdir("user/$fd");
file_put_contents("user/$fd/com.txt",'none');
}
//
//
if($text == $bback || $text == $bback2 || $text == $backmod){
   if($bback == $text){msg($cd,"به منوی اصلی برگشتیم🏠","html",true,$b_menu);}
   elseif($bback2 == $text){msg($cd,"به منوی قبل برگشتیم🏘");}
   elseif($backmod == $text){msg($cd,"منوی قبل:");}
 file_put_contents("user/$fd/com.txt",'none');
}elseif($text and $fd != $mod){
    msg($cd,"ربات موقتا غیر فعال میباشد");
}elseif(preg_match('/^\/(start)/',$text)){
    if(strpos("$stats","$fd") !== false and strpos("$text","/start ") !== false and $coin == null){
$user = str_replace('/start ','',$text);
msg($user,'in');
    }
 msg($chat_id,'به ربات ویوبگیر خوش آمدید 🌹

👌یه ربات برای افزایش رایگان بازدید پست های تلگرام بدون پرداخت حتی یک ریال پول 💳
با این ربات قادر خواهید بود در تمام چالش ها برنده شوید و از فروش بازدید کسب در آمد کنید .

👈 در ویوبگیر شما ابتدا پست های دیگران رو مشاهده میکنید و به ازای هر بازدید یک سکه دریافت میکنید;سپس با سکه هایی که بدست اوردید از بخش "ثبت تبلیغ📰" برای پست خود یا دیگران به هر میزان که خواستید بازدید میگیرید.

❇️برای کسب اطلاعات بیشتر دکمه "❓راهنما❔" را کلیک کنید , همچنین برای اطلاع از جدیدترین اخبار و بروزرسانی ها حتما عضو کانال ما '.$channel.' بشید 👍','html',true,$b_menu);
}elseif(preg_match('/^(view_)/',$data)){
    $adn = str_replace('view_','',$data);
$adin = file_get_contents("ads/get/$adn.txt");
if(strpos("$adin","$fd") !== false){
 bot('answerCallbackQuery',[
        'callback_query_id'=>$data_id,
        'text'=>'قبلا از این تبلیغ سکه گرفتید‼️',
		'show_alert'=>false]);
}else{ $wc = $coin+1;
bot('answerCallbackQuery',[
        'callback_query_id'=>$data_id,
        'text'=>'✅یک سکه دریافت کردید| موجودی : '.$wc,
		'show_alert'=>false]);
    file_put_contents("user/$fd/coin.txt",$wc);
    $tdd = file_get_contents("ads/tedad/$adn.txt");
    $geted = count(explode("\n","$adin"));
    file_put_contents("ads/get/$adn.txt","$adin\n$fd");
if($tdd >= $geted){
$mi = file_get_contents("ads/msg id/$adn.txt");
$from = file_get_contents("ads/from/$adn.txt");
Bot('DeleteMessage',['chat_id'=>$channel_ads,'message_id'=>$mi]);
Bot('DeleteMessage',['chat_id'=>$channel_ads,'message_id'=>$mi+1]);
unlink("ads/from/$adn.txt");
unlink("ads/msg id/$adn.txt");
unlink("ads/show id/$adn.txt");
unlink("ads/time/$adn.txt");
unlink("ads/rep/$adn.txt");
unlink("ads/tedad/$adn.txt");
unlink("ads/get/$adn.txt");
msg($from,"سفارش $adn انجام شد✅");

}}}elseif(preg_match('/^(rep_)/',$data)){
}elseif($text == $breq){
msg($cd,"دکمه مورد نظر خود را انتخاب کنید :",'html',true,$b_new);
}elseif($text == $bprice){
    if($vuday == null){$vuday = 0;}
msg($cd,"<b>📊وضعیت کنونی حساب ویوگیر شما : 
🆔 شناسه ویوگیر :</b> <code>$fd</code>
<b>💰 موجودی : $coin
👀 بازدید امروز : $vuday</b>",'html');
}elseif($text == $bview){
    $usr = str_replace('@','',$channel_ads);
   msg($cd,"جهت دریافت سکه با دیدن تبلیغ ابتدا باید در کانال
👉 $channel_ads
عضو شده و با کلیک دکمه ثبت ویو هر تبلیغ سکه دریافت کنید👍
همچنین اگر مشاهده کردید تبلیغی ( پستی ) دارای محتوایی [ غیر اخلاقی +۱۸ ، سیاسی ، الفاز رکیک و یا نظایر آن ] است با دکمه گزارش به مدیر اطلاع رسانی دهید و پس از تایید مدیر ۵ سکه دریافت کنید😊
همچنین نباید الکی تبلیغی را گزارش دهید و در صورت تکرار آن از ربات مسدود میشوید‼️",'html',true,json_encode(['inline_keyboard'=>[ [['text'=>'ورود به کانال','url'=>'https://telegram.me/'.$usr]],
]]));
}elseif($text == $bhelp){
   $Text = '◀️کار با ربات چجوریه؟
- شما با این ربات تبلیغ هایی (پست هایی) که کاربران ثبت کرده اند را میبینید و سکه دریافت میکنید ؛ سپس با سکه ها میتونید تبلیغ خودتونو ثبت نمایید😊

◀ چجوری تبلیغمو ثبت کنم؟
دکمه ثبت تبلیغ را کلیک کنید سپس با دکمه ثبت تبلیغ جدید تبلیغ خود را ثبت نمایید.

◀️ چجوری سکه جمع کنم؟
- اگه به منوی دریافت سکه رایگان مراجعه کنید روش هایی برای جمع آوری سکه بیان شده است .

◀️ چجوری با مشاهده تبلیغ سکه بگیرم؟
- در کانال تبلیغات ، متن هایی که در زیر تبلیغات ارسال میشود و دارای دکمه شیشه ای است.
با کلیک دکمه ثبت ویو سکه خود را دریافت میکنید و با دکمه گزارش تخلف اگه دیدید پست کاربر دارای موارد خلاف قوانین ربات است آن را گزارش داده و سکه بیشتری دریافت کنید البته بعد تایید آن توسط مدیر و اینکه گزارش دروغین نداده باشید.
توجه : اگر الکی چندین پست بدون مشکل رو گزارش کنید از ربات مسدود میشوید.

🆔 @VuGir';
msg($cd,$Text);
    
}elseif($text == $bgetcoin){
    msg($cd,"یک روش برای جمع آوری سکه انتخاب کن👇","html",true,$b_coin);
}elseif($text == $bsup){
msg($cd,'جهت هر گونه مشکل یا سوال به پیوی مدیر یا پیام رسان آن مراجعه کنید:
🆔 @Nex_Admin
🤖 @PvEghbalbot');
}elseif($text == $bshop){
    msg($cd,'فروشگاه فعلا تعطیله');
}elseif($text == $bnew){
    if($coin < 100){msg($cd,'با عرض پوزش جهت ثبت تبلیغ حداقل باید ۱۰۰ سکه داشته باشید‼️');
    }else{
msg($cd,'پست یا تبلیغ خود را برام فروارد کنید :','html',true,$b_back);
file_put_contents("user/$fd/com.txt",'new');
}}elseif($com == 'new'){
fwd($cd,$fd,$msg_id);
file_put_contents("user/$fd/sav1.txt",$msg_id);
msg($cd,'پیشنمایش تبلیغ شما☝️

خب حالا بگید چند بازدید میخواهید❓');
file_put_contents("user/$fd/com.txt",'new 2');
}elseif($com == 'new 2'){
if(preg_match('/^([0-9])/',$text) and $text == round($text) and $text < $coin and $text >= '100'){
$code = pass(10);
file_put_contents("user/$fd/coin.txt",($coin - $text));
msg($cd,"تبلیغ شما با موفقیت ثبت شد✅
🛑کد پیگیری سفارش : $code",'html',true,$b_menu);
$file = file_get_contents('https://api.telegram.org/bot'.API_KEY."/forwardMessage?chat_id=$channel_ads&from_chat_id=$fd&message_id=$sav1");
$json = json_decode($file,true);
$reply = $json["result"]["message_id"];
//+++++++++++++++++++++++++++++++++++++\\
$file2 = file_get_contents('https://api.telegram.org/bot'.API_KEY."/forwardMessage?chat_id=$channel_all&from_chat_id=$fd&message_id=$sav1");
$json2 = json_decode($file2,true);
$id = $json2["result"]["message_id"];
file_put_contents("ads/from/$code.txt",$fd);
file_put_contents("ads/msg id/$code.txt",$reply);
file_put_contents("ads/show id/$code.txt",$id);
file_put_contents("ads/tedad/$code.txt",$text);
file_put_contents("ads/time/$code.txt",date('y/m/d')."\n".date('s:i:h'));
file_put_contents("ads/get/$code.txt",'');
file_put_contents("user/$fd/sav1.txt",'');
bot('sendmessage',[
    'chat_id'=>$channel_ads,
    'reply_to_message_id'=>$reply,
    'text'=>$text,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
        [['text'=>'ثبت ویو👁‍🗨','callback_data'=>"view_$code"],['text'=>'گزارش⚠️','callback_data'=>"rep_$code"]],
]])]);
file_put_contents("user/$fd/com.txt",'none');
}else{
if(preg_match('/^([0-9])/',$text) and ($coin < $text || $text < 100)){
    msg($cd,"تعداد بازدید درخواستی مجاز نمیباشد⚠️
شما میتوانید حداقل 100 و حداکثر $coin بازدید سفارش دهید‼");
}else{
msg($cd,'تعداد بازدید درخواستی خود را بصورت صحیح و به صورت لاتین (123) ارسال نمایید‼️'); 
}}}elseif(preg_match('/^\/(or_)/',$text)){
$cod = str_replace('/or_','',$text);
if(file_get_contents("ads/time/$cod.txt") != true){ msg($cd,"کد پیگیری معتبر نمیباشد");
}else{
$tedad = file_get_contents("ads/tedad/$cod.txt");
$time = file_get_contents("ads/time/$cod.txt");
$get = file_get_contents("ads/get/$cod.txt");
$geted = count(explode("\n","$get")) -1;
$exp = explode("\n","$time");
$exp2 = $exp[0];
msg($cd,"👁‍🗨درخواستی: $tedad
👁دریافتی : $geted
⏰ساعت : $exp1
🗓تاریخ : 20$exp2
👀مشاهده تبلیغ 👇
👉 /show_$cod");
}}elseif(preg_match('/^\/(show_)/',$text)){
    $cod = str_replace("/show_",'',$text);
    if(file_get_contents("ads/time/$cod.txt") == true){
 $mid = file_get_contents("ads/show id/$cod.txt");
fwd($cd,$channel_all,$mid);
    }else{
        msg($cd,'کد نمایش اشتباه است‼️');
    }
}elseif($text == $bgetfree){
    
}elseif(preg_match('/^(view_)/',$data)){
    $adn = str_replace('view_','',$data);
$adin = file_get_contents("ads/get/$adn.txt");
if(strpos("$adin","$fd") !== false){
 bot('answerCallbackQuery',[
        'callback_query_id'=>$data_id,
        'text'=>'قبلا از این تبلیغ سکه گرفتید‼️',
		'show_alert'=>false
    ]);
}else{
    msg($fd,'n');
    $wc = $coin+1;
    bot('answerCallbackQuery',[
        'callback_query_id'=>$data_id,
        'text'=>'✅یک سکه دریافت کردید| موجودی : '.$wc,
		'show_alert'=>false,
    ]);
}}elseif(preg_match('/^(rep_)/',$data)){
    msg($fd,'n');
}
elseif($text == $text){ msg($fd,"یافت نشد");}//END ...
if($coin == null){file_put_contents("user/$fd/coin.txt",0);}
unlink('error_log');
//THE END :D
?>