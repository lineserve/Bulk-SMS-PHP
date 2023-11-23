<?php
class LineserveBulkSMS
{



    function sendSMS($phonenumber, $message, $senderid, $token)
    {
        $data1 = [
            'phone_number' => $phonenumber,
            'sender_id' => $senderid,
            'text_message' => $message,
        ];

        $curl = curl_init();



        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://bulksms.lineserve.net/api/sendmessage",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            // CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
                "Authorization: Bearer $token"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            print_r(json_decode($response));
        }
    }
}
