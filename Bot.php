<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');
require_once('./Introduction.php');
require_once('./Skill.php');
require_once('./Greeting.php');
require_once('./Help.php');
require_once('./Portfolio.php');

$channelAccessToken = '<channelAccessToken>';
$channelSecret = '<channelSecret>';

function GetIntent($msg)
{
    $json = file_get_contents('https://spreadsheets.google.com/feeds/list/16pW4yB7lY8Su3i_kGQ2ZQOU5k4ZhtskQDfCsWKGyWik/od6/public/values?alt=json');
    $data = json_decode($json, true);
    $result = array();

    foreach ($data['feed']['entry'] as $item) 
    {
        $keywords = explode(',', $item['gsx$keywords']['$t']);
        foreach ($keywords as $keyword)
        {
            if (mb_strpos($msg, $keyword) !== false) 
            {
                $result = $item['gsx$intent']['$t'];
                return $result;
            }
        }
    }

    return $result;
}

function SendReply($client, $event, $replyMsg)
{
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => $replyMsg
    ));
}

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $intent = GetIntent($message['text']);
                    switch ($intent) {
                        case 'hello':
                            $replyMsg = RandomHello();
                            break;

                        case 'bye':
                            $replyMsg = RandomBye();
                            break;

                        case 'introduction':
                            $replyMsg = GetIntroduction();
                            break;

                        case 'skill':
                            $replyMsg = GetSkillType();
                            break;

                        case 'portfolio':
                            $replyMsg = GetPortfolio();
                            break;

                        case 'help':
                            $replyMsg = GetHelp();
                            break;
                        
                        default:
                            if ($message['text'] != "什麼！？ Promote Bot 還會發優惠券？" &&
                                $message['text'] != "聽說有優惠券可以拿！？" &&
                                $message['text'] != "把優惠券什麼的交出來") 
                            {
                                $replyMsg = array(
                                    array(
                                        'type' => 'text',
                                        'text' => "我聽不太懂...",
                                    ),
                                    array(
                                        'type' => 'text',
                                        'text' => "或許你可以試試↓↓",
                                        'quickReply' => QuickHelp()
                                    )
                                );
                            }
                            break;
                    }
                    break;

                default:
                    $replyMsg = RandomSticker();
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            SendReply($client, $event, $replyMsg);
            break;

        case 'postback':
            $postback = $event['postback'];
            $data = explode('&', $postback['data']);
            $postbackIntent = explode('=', $data[0]);

            switch ($postbackIntent[1]) {
                case 'skill':
                    $skillType = explode('=', $data[1]);
                    $replyMsg = GetSkillInfo($skillType[1]);
                    break;

                case 'introduction':
                    $introType = explode('=', $data[1]);
                    $replyMsg = GetIntroInfo($introType[1]);
                    break;

                case 'portfolio':
                    $infoType = explode('=', $data[1]);
                    $para = explode('=', $data[2]);
                    switch ($infoType[1]) {
                        case 'tech':
                            $replyMsg = GetPortfolioTechInfo($para[1]);
                            break;
                        
                        case 'detail':
                            $replyMsg = GetPortfolioDetailInfo($para[1]);
                            break;

                        default:
                            error_log("Unsupporeted portfolio infoType: " . $infoType);
                            break;
                    }
                    break;

                case 'quickPortfolio':
                    $replyMsg = QuickGetPortfolio();
                    break;
                
                default:
                    error_log("Unsupporeted postback intent: " . $postbackIntent);
                    break;
            }
            SendReply($client, $event, $replyMsg);
            break;

        default:
            $replyMsg = RandomSticker();
            SendReply($client, $event, $replyMsg);
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
