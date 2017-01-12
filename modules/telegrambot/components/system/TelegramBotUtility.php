<?php
/**
 * TelegramBotUtility class file
 *
 * Contains many function that most used :
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @created date 10 January 2017, 01:38 WIB
 * @version 1.0
 * @copyright Copyright (c) 2017 Ommu Platform (ommu.co)
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

class TelegramBotUtility
{
	public function getRequest($token, $method, $parameters, $type=null) 
	{		
		if(!is_string($method)) {
			error_log("Method name must be a string\n");
			return false;
		}
 
		if(!$parameters)
			$parameters = array();
		else if (!is_array($parameters)) {
			error_log("Parameters must be an array\n");
			return false;
		}
		
		$urlAPI = 'https://api.telegram.org/bot'.$token;
		if($type == null)
			$url = $urlAPI.'/'.$method;
		else
			$parameters["method"] = $method;
		
		if($type != 'webhook') {
			file_put_contents('telebot_url.txt', $url);
			
			$handle = curl_init();
			curl_setopt($handle, CURLOPT_URL, $url);
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($handle, CURLOPT_TIMEOUT, 0);	
			if($type == null) {
				curl_setopt($handle, CURLOPT_POST, true);		
				curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($parameters));
			}
			if($type != null && $type == 'json') {
				curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));	
				curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			}			
			$response = curl_exec($handle);	
	 
			if($response === false) {
				file_put_contents('exec_response_false.txt', $response);
				$errno = curl_errno($handle);
				$error = curl_error($handle);
				error_log("Curl returned error $errno: $error\n");
				curl_close($handle);
				return false;
			} else
				file_put_contents('exec_response_true.txt', $response);
			
			$http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
			curl_close($handle);
	 
			if($http_code >= 500) {
				// do not want to DDOS server if something goes wrong
				sleep(10);
				return false;
				
			} else if($http_code != 200) {
				$response = json_decode($response, true);
				error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
				if($http_code == 401)
					throw new Exception('Invalid access token provided');
				return false;
				
			} else {
				$response = json_decode($response, true);
				if(isset($response['description']))
					error_log("Request was successfull: {$response['description']}\n");
				$response = $response['result'];
			}
		 
			return $response;
			
		} else {
			header("Content-Type: application/json");
			echo json_encode($parameters);
			return true;
		}
	}
}
