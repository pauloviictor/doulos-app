<?php

namespace App\Comunication\Telegram;

use Exception;
use Illuminate\Http\Response;
use TelegramBot\Api\BotApi;

class ScaleAlert{
    const TELEGRAM_BOT_TOKEN = '';
    const TELEGRAM_CHAT_ID = '';

    public static function sendMessage(string $message){
        try{
            $bot = new BotApi(self::TELEGRAM_BOT_TOKEN);

            return $bot->sendMessage(self::TELEGRAM_CHAT_ID, $message);
        } catch (Exception $e){
            return response('Please create your bot and catch chat id', Response::HTTP_PRECONDITION_REQUIRED);
        }
    }
}
