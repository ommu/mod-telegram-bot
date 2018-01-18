<?php
/**
 * TelegramBotUtility class file
 *
 * Contains many function that most used :
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @created date 10 January 2017, 01:38 WIB
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/ommu-telegram-bot
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
			//file_put_contents('telebot_url.txt', $url);
			
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
				//file_put_contents('exec_response_false.txt', $response);
				$errno = curl_errno($handle);
				$error = curl_error($handle);
				error_log("Curl returned error $errno: $error\n");
				curl_close($handle);
				return false;
			} //else
				//file_put_contents('exec_response_true.txt', $response);
			
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
	public function insertTelegramBotUser($setting_id, $message) 
	{
		if(!is_string($setting_id)) {
			error_log("Setting must be a string\n");
			return false;
		}
 
		if(!$message)
			$message = array();
		else if (!is_array($message)) {
			error_log("Messages must be an array\n");
			return false;
		}
		
		/*
		$message_id = $message['message_id'];
		$from_id = $message['from']['id'];
		$from_first_name = $message['from']['first_name'];
		$from_last_name = $message['from']['last_name'];
		$from_username = $message['from']['username'];
		$chat_id = $message['chat']['id'];
		$chat_first_name = $message['chat']['first_name'];
		$chat_last_name = $message['chat']['last_name'];
		$chat_username = $message['chat']['username'];
		$chat_title = $message['chat']['title'];
		$chat_type = $message['chat']['type'];
		*/
		
		$findUser = TelegrambotUsers::model()->findByAttributes(array('setting_id' => $setting_id, 'telegram_id' => $message['chat']['id']), array(
			'select' => 'status, subscribe_id, user_id, telegram_first_name, telegram_last_name, telegram_username',
		));
		if($findUser == null) {
			$newUser = new TelegrambotUsers;
			$newUser->setting_id = $setting_id;
			$newUser->telegram_id = $message['chat']['id'];
			if($message['chat']['type'] == 'private') {
				$newUser->telegram_first_name = $message['chat']['first_name'];
				$newUser->telegram_last_name = $message['chat']['last_name'];
				$newUser->telegram_username = $message['chat']['username'];
			} else
				$newUser->telegram_first_name = $message['chat']['title'];
			$newUser->telegram_type = $message['chat']['type'];
			$newUser->save();
			
		} else {
			if($message['chat']['type'] == 'private') {
				if($findUser->telegram_first_name != $message['chat']['first_name'])
					$findUser->telegram_first_name = $message['chat']['first_name'];
				if($findUser->telegram_last_name != $message['chat']['last_name'])
					$findUser->telegram_last_name = $message['chat']['last_name'];
				if($findUser->telegram_username != $message['chat']['username'])
					$findUser->telegram_username = $message['chat']['username'];
			} else
				$findUser->telegram_first_name = $message['chat']['title'];			
			$findUser->update();
		}
	}
}
