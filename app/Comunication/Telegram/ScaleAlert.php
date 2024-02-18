<?php

namespace App\Comunication\Telegram;

use App\Secret\SensitiveData;
use Exception;
use Illuminate\Http\Response;
use TelegramBot\Api\BotApi;

class ScaleAlert{

    public static function sendMessage(string $message){
        try{
            $bot = new BotApi(SensitiveData::TELEGRAM_BOT_TOKEN);
            return $bot->sendMessage(SensitiveData::TELEGRAM_CHAT_ID, $message);
        } catch (Exception $e){
            return response('Please create your bot and catch chat id', Response::HTTP_PRECONDITION_REQUIRED);
        }
    }
}
