<?php


/**
 * 
 */
class Revai
{
    private $_token="02hV_qXuhImDltKJ20bpO92U-JyHDy-Uy-dE33KOB81N8VJxz2kbNc5R3dxqLVDvXifBKYGdvP3z6ZeVUTHPCebqD4rUQ";
    
    private $url="https://api.rev.ai/speechtotext/v1/";

    public function jobs($media_url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url.'jobs');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 
            "{\"media_url\":\"".$media_url."\",\"metadata\":\"tva.lifepc.uz send transcription\"}");

        $headers = array();
        $headers[] = 'Authorization: Bearer '.$this->_token;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            return 'Error:' . curl_error($curl);
        }else{
            return $result;
        }
        curl_close($curl);
    }

    public function transcription($job_id)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url."jobs/".$job_id.'/transcript');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: Bearer '.$this->_token;
        $headers[] = 'Accept: text/plain';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            return 'Error:' . curl_error($curl);
        }else{
            return $result;
        }
        curl_close($curl);
    }

    public function getProgress($job_id)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url."jobs/".$job_id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: Bearer '.$this->_token;

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            return 'Error:' . curl_error($curl);
        }else{
            return $result;
        }
        curl_close($curl);
    }

}

