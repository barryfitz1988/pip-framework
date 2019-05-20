<?php
class Curl
{

    function connectToSalesForce($tokenUrl,$params, $stmt){
        $curl = curl_init($tokenUrl);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if($status == 200){
            $stmt = json_decode($json_response, true);
        }
        else{
            $stmt = 'ERROR';
        }
        return $stmt;
    }

    function returnResultsFromSalesForce($queryUrl,$accessToken){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $queryUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // We need to pass the access token in the header, *not* as a URL parameter
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $accessToken));
        // Make the API call, and then extract the information from the response
        return curl_exec($ch);
    }

}