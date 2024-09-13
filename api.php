<?php
class yosiket
{
  public function slip_check($qrcode)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://suba.rdcw.co.th/v1/inquiry',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
          "payload": "' . $qrcode . '"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        /// เองยังเด็กเกินกว่าจะเขียนเองได้ เราเลยทำไห้หมดแล้ว อิอิ
        /// สคริปต์นี้สงวนสิทธิ์ LUCKYSHOP สนับสนุนเรา 
        /// แก้เลขจากตรงนี้ base64_encode('เลขclientid:เลขsecret')
        'Authorization: Basic ' . base64_encode('ใส่เลขclientid:ใส่เลขsecret')
      ),
    ));

    $response = curl_exec($curl);
    return $response;
  }
}
