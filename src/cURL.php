<?php
/** 
 * PHP OOP cURL
 * 
 * @author   Fxc Jahid <fxcjahid3@gmail.com>
 * @license  http://opensource.org/licenses/MIT
 * @package  PHP cURL
 */

namespace  crazzy\cURL;

class cURL{

    
    function __construct($option=null){ 
    }
    
    public function setHeader(array $array = null)
    {
        $this->getHeader = $array;
    }

    public function setBody($body = null,$type = '')
    {
        $this->getBody = $body;
        $this->bodyType = $type;
    }
    
    public function request($type,$url){
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);  
        // Will return the response, if false it print the response
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeader);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getBody);
          
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 
        // Execute
        $result=curl_exec($curl); 
        curl_close($curl);

        // Will dump a beauty json :3
        return $result;

    }

}