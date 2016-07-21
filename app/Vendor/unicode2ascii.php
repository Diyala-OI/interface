<?php
class unicode2ascii{
    function utf8_to_ascii($str, $replacement='_') {

    $chars = array(

    'a' => array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),

    'e' => array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),

    'i' => array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),

    'o' => array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),

    'u' => array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),

    'y' => array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),

    'd' => array('đ','Đ'),

    $replacement => array(' ','%20'),

    );

    foreach ($chars as $key => $arr)

    foreach ($arr as $val)

    $str = str_replace($val,$key,$str);

    return $str;
    }

///* Important: If passing this value via URL you might want to make it
//explorer friendler */
//$encoded = bin2hex(Encode(base64_encode($encodeThis),$secretPass));
///* Another pass to decode */
//$decoded = base64_decode(Encode(hex2bin($encoded),$secretPass));
//
//echo '<br /><br />Encoded String: '.$encoded;
//echo '<br />Decoded String: '.$decoded;
    function Encode($data,$pwd="#OO#*U\$O(*YO")
    {
        $pwd .= Configure::read('Security.salt');
        $pwd_length = strlen($pwd);
        for ($i = 0; $i < 255; $i++) {
            $key[$i] = ord(substr($pwd, ($i % $pwd_length)+1, 1));
            $counter[$i] = $i;
        }
        $x = 0;
        for ($i = 0; $i < 255; $i++) {
            $x = ($x + $counter[$i] + $key[$i]) % 256;
            $temp_swap = @$counter[$i];
            $counter[$i] = @$counter[$x];
            $counter[$x] = $temp_swap;
        }
        $a=0;
        $j=0;
        $Zcrypt=null;
        for ($i = 0; $i < strlen($data); $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $counter[$a]) % 256;
            $temp = $counter[$a];
            $counter[$a] = $counter[$j];
            $counter[$j] = $temp;
            $k = $counter[(($counter[$a] + $counter[$j]) % 256)];
            $Zcipher = ord(substr($data, $i, 1)) ^ $k;
            $Zcrypt .= chr($Zcipher);
        }
        return $Zcrypt;
    }

    function hex2bin($hexdata) {
        $bindata = null;
        for ($i=0;$i<strlen($hexdata);$i+=2) {
            $bindata.=chr(hexdec(substr($hexdata,$i,2)));
        }
        return $bindata;
    }
}
?>
