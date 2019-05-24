<?php

function GetPortfolio()
{
    $re = array(
        array(
            'type' => 'text',
            'text' => "雖然做過的專案很多，但我精選了以下三樣！"
        ),
        array(
            'type' => 'template',
            'altText' => "This is a carousel template",
            'template' => array(
                'type' => 'carousel',
                'columns' => array(
                    array(
                        'thumbnailImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/PDOGS.png",
                        'title' => "Programming Design Online Grading System",
                        'text' => "資管系程式設計線上批改系統",
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => '使用技術',
                                'data' => "intent=portfolio&type=tech&item=pdogs",
                                'displayText' => RandomTechText("PDOGS")
                            ),
                            array(
                                'type' => 'postback',
                                'label' => '詳細說明',
                                'data' => "intent=portfolio&type=detail&item=pdogs",
                                'displayText' => RandomDetailText("PDOGS")
                            )
                        )
                    ),
                    array(
                        'thumbnailImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/MusicChatbot.png",
                        'title' => "Music Chatbot",
                        'text' => "智慧對話機器人課程專案",
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => '使用技術',
                                'data' => "intent=portfolio&type=tech&item=chatbot",
                                'displayText' => RandomTechText("Music Chatbot")
                            ),
                            array(
                                'type' => 'postback',
                                'label' => '詳細說明',
                                'data' => "intent=portfolio&type=detail&item=chatbot",
                                'displayText' => RandomDetailText("Music Chatbot")
                            )
                        )
                    ),
                    array(
                        'thumbnailImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/Tangible.png",
                        'title' => "RFIWall",
                        'text' => "實驗室研究項目",
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => '使用技術',
                                'data' => "intent=portfolio&type=tech&item=rfiwall",
                                'displayText' => RandomTechText("RFIWall")
                            ),
                            array(
                                'type' => 'postback',
                                'label' => '詳細說明',
                                'data' => "intent=portfolio&type=detail&item=rfiwall",
                                'displayText' => RandomDetailText("RFIWall")
                            )
                        )
                    )
                )
            )
        )
    );
    return $re;
}

function QuickGetPortfolio()
{
    $re = array(
        array(
            'type' => 'template',
            'altText' => "This is a carousel template",
            'template' => array(
                'type' => 'carousel',
                'columns' => array(
                    array(
                        'thumbnailImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/PDOGS.png",
                        'title' => "Programming Design Online Grading System",
                        'text' => "資管系程式設計線上批改系統",
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => '使用技術',
                                'data' => "intent=portfolio&type=tech&item=pdogs",
                                'displayText' => RandomTechText("PDOGS")
                            ),
                            array(
                                'type' => 'postback',
                                'label' => '詳細說明',
                                'data' => "intent=portfolio&type=detail&item=pdogs",
                                'displayText' => RandomDetailText("PDOGS")
                            )
                        )
                    ),
                    array(
                        'thumbnailImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/MusicChatbot.png",
                        'title' => "Music Chatbot",
                        'text' => "智慧對話機器人課程專案",
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => '使用技術',
                                'data' => "intent=portfolio&type=tech&item=chatbot",
                                'displayText' => RandomTechText("Music Chatbot")
                            ),
                            array(
                                'type' => 'postback',
                                'label' => '詳細說明',
                                'data' => "intent=portfolio&type=detail&item=chatbot",
                                'displayText' => RandomDetailText("Music Chatbot")
                            )
                        )
                    ),
                    array(
                        'thumbnailImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/Tangible.png",
                        'title' => "RFIWall",
                        'text' => "實驗室研究項目",
                        'actions' => array(
                            array(
                                'type' => 'postback',
                                'label' => '使用技術',
                                'data' => "intent=portfolio&type=tech&item=rfiwall",
                                'displayText' => RandomTechText("RFIWall")
                            ),
                            array(
                                'type' => 'postback',
                                'label' => '詳細說明',
                                'data' => "intent=portfolio&type=detail&item=rfiwall",
                                'displayText' => RandomDetailText("RFIWall")
                            )
                        )
                    )
                )
            )
        )
    );
    return $re;
}

function GetPortfolioTechInfo($item)
{
    switch ($item) {
        case 'pdogs':
            $msg = 
            "PDOGS 使用了\n".
            "● PHP\n".
            "● CodeIgniter\n".
            "● MySQL";
            break;
        
        case 'chatbot':
            $msg = 
            "Music Chatbot 專案有用到\n".
            "● Python\n".
            "● NLP";
            break;
        
        case 'rfiwall':
            $msg = 
            "RFIWall 的部份用了\n".
            "● RFID\n".
            "● Arduino\n".
            "● Unity";
            break;
        
        default:
            error_log("Unsupporeted item: ". $item);
            break;
    }

    $re = array(
        array(
            'type' => 'text',
            'text' => $msg,
            'quickReply' => QuickPortfolio()
        )
    );
    return $re;
}

function GetPortfolioDetailInfo($item)
{
    switch ($item) {
        case 'pdogs':
            $re = array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/PDOGS.png",
                    'previewImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/PDOGSS.png"
                ),
                array(
                    'type' => 'text',
                    'text' => "PDOGS 提供簡單易操作的介面，讓學生可以上傳作業程式碼並即時得到批改結果。"
                ),
                array(
                    'type' => 'text',
                    'text' => "而我在擔任網管期間替系統加入了程式競賽、互相批改以及小組報告競賽等新功能。"
                ),
                array(
                    'type' => 'text',
                    'text' => "其中最大的更新是對使用者群組的擴充，從底層資料庫到上層的使用介面均有相當幅度的改動，讓原來僅能支援單一課程使用的系統，升級成可供多個課程同時使用。",
                    'quickReply' => QuickPortfolio()
                )
            );
            break;
        
        case 'chatbot':
            $re = array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/MusicChatbot.png",
                    'previewImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/MusicChatbotS.png"
                ),
                array(
                    'type' => 'text',
                    'text' => "此專案為修習智慧對話機器人課程的期末小組專案，我們所開發出的 Music Chatbot 能讓使用者以語音對話的方式進行互動。"
                ),
                array(
                    'type' => 'text',
                    'text' => "功能部分則可以讓使用者查詢想聽的歌曲並直接播放，不知道想聽甚麼歌的時候也可以透過描述 (Ex. 幫我播寫功課聽的歌) 來讓 Chatbot 為你播放適合的歌曲。"
                ),
                array(
                    'type' => 'text',
                    'text' => "除了播歌功能以外，此 Chatbot 還能為使用者提供查詢歌手、歌詞等服務。",
                    'quickReply' => QuickPortfolio()
                )
            );
            break;
        
        case 'rfiwall':
            $re = array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/Tangible.png",
                    'previewImageUrl' => "https://chin-yuan-linebot.azurewebsites.net/line-bot/img/TangibleS.png"
                ),
                array(
                    'type' => 'text',
                    'text' => "RFIWall 是一個結合了 RFID、電容感應與堆疊結構的研究項目，它能讓使用者利用推疊與觸摸方塊的模式來與數位介面進行互動。"
                ),
                array(
                    'type' => 'text',
                    'text' => "附圖是 RFIWall 在兒童程式教學上的應用，兒童可以在空格中疊上對應的程式方塊 (Ex. 迴圈指令、烹煮指令)，使遊戲中的廚師順利完成料理。"
                ),
                array(
                    'type' => 'text',
                    'text' => "可任意堆疊啟動的 RFID 標籤與方塊上的觸控設計是以往 Tangible 裝置所不具備的功能，藉由 RFIWall，使用者與數位介面的互動可以更加多元，並為 Tangible 相關領域帶來更多可能性。",
                    'quickReply' => QuickPortfolio()
                )
            );
            break;
        
        default:
            error_log("Unsupporeted item: " . $item);
            break;
    }

    
    return $re;
}

function QuickPortfolio()
{
    $re = array(
        'items' => array(
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'postback',
                    'label' => '看看其他作品',
                    'data' => "intent=quickPortfolio"
                )
            )
        )
    );
    return $re;
}

function RandomTechText($topic)
{
    $re = array(
        $topic." 使用了哪些技術呢？",
        "那 ". $topic ." 用了哪些技術啊？",
        "想知道 ". $topic ." 是用什麼技術做的"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}

function RandomDetailText($topic)
{
    $re = array(
        "跟我介紹一下 ". $topic." 在做什麼",
        $topic ." 是做什麼用的啊？",
        "想更了解 ". $topic
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}
