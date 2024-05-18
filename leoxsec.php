<?php

system('clear');

function encryptHTMLFile($inputFile, $key)
{
 
    $content = file_get_contents($inputFile);


    $encryptedContent = openssl_encrypt($content, 'AES-256-CBC', $key, 0, str_repeat("\0", 16));


    $outputFile = pathinfo($inputFile, PATHINFO_FILENAME) . '_enc.html';


    file_put_contents($outputFile, $encryptedContent);
    
    sleep('2');
    
    echo "     File berhasil dienkripsi. Hasil enkripsi tersimpan dalam: $outputFile\n";
}


                                                                      
$anjay = '

    $$\                                                                  
    $$ |                                                                 
    $$ |      $$$$$$\   $$$$$$\  $$\   $$\  $$$$$$$\  $$$$$$\   $$$$$$$\ 
    $$ |     $$  __$$\ $$  __$$\ \$$\ $$  |$$  _____|$$  __$$\ $$  _____|
    $$ |     $$$$$$$$ |$$ /  $$ | \$$$$  / \$$$$$$\  $$$$$$$$ |$$ /      
    $$ |     $$   ____|$$ |  $$ | $$  $$<   \____$$\ $$   ____|$$ |      
    $$$$$$$$\\$$$$$$$\ \$$$$$$  |$$  /\$$\ $$$$$$$  |\$$$$$$$\ \$$$$$$$\ 
    \________|\_______| \______/ \__/  \__|\_______/  \_______| \_______|                                                                 
    _______________________________________________________________________

    [#] Author      :   Leoxsec
    [#} Github      :   https://github.com/dimasxploit

    [!] warnning, ingat kunci enkripsi agar saat mendeskripsi file lebih mudah!


';
$anjay = "\033[1;33m" . $anjay . "\033[0m";

$anjay = str_replace('[#]', "\033[0;31m[#]", $anjay);
$anjay = str_replace('[!] warnning,', "[!]\033[0;31m warnning,", $anjay);
echo $anjay;

echo "     Masukkan path file HTML: ";
$inputFile = trim(fgets(STDIN));

echo "     Masukkan kunci enkripsi: ";
$key = trim(fgets(STDIN));


if (!file_exists($inputFile)) {
    echo "     File input tidak ditemukan.\n";
    exit(1);
}


if (pathinfo($inputFile, PATHINFO_EXTENSION) !== 'html') {
    echo "     File input harus berupa file HTML.\n";
    exit(1);
}


encryptHTMLFile($inputFile, $key);
