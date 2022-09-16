<?php

function APIMiddleware($array_plaintext, $path){
    $privatekey = config('app.PRIVATEKEY');
    $publickey = config('app.PUBLICKEY');
    $url = config('app.URLAPIMIDDLEWARE') . $path;
    $data = json_encode($array_plaintext);

    // dump($data);

    //Padding for Triple DES ECB
    $blockSize = 8;
    $len = strlen($data);
    $pad = $blockSize - ($len % $blockSize);
    $data .= str_repeat(chr($pad), $pad);

    $privatekey .= substr($privatekey, 0, 8);

    $method = 'des-ede3'; //TRIPLE DES ECB
    $ciphertext = openssl_encrypt($data, $method, $privatekey, OPENSSL_NO_PADDING);
    $ciphertext = base64_encode($ciphertext);

    // dd($ciphertext);

    $response = Http::post($url, [
        'data' => $ciphertext,
        'XPublic' => $publickey,
    ]);
    $response->throw();
    $data = $response->json();

    return $data;
}

function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('/', $tanggal);

    // dd($pecahkan);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
    // dd($pecahkan[1] . ' ' . $bulan[ (int)$pecahkan[0] ] . ' ' . $pecahkan[2]);
    return $pecahkan[1] . ' ' . $bulan[ (int)$pecahkan[0] ] . ' ' . $pecahkan[2];
}

function checkPrivileges($FName){
    $dataPrivileges = array(
        'Username' => session('ID'),
        'Password' => session('Password'),
        'FName' => $FName
    );  
    $privileges = APIMiddleware($dataPrivileges, 'CheckPrivileges');
    if ($privileges['code'] == '400'){
        abort('403','No Access Privileges.');
    }
}