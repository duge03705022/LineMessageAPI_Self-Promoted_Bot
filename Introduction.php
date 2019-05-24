<?php

function GetIntroduction()
{
    $re = array(
        array(
            'type' => 'text',
            'text' => "我是臺灣大學資訊管理學研究所碩一的盧慶原，目前在通訊及多媒體實驗室 (CMLab) 擔任研究生，專長為軟體開發、資料科學與系統設計，擁有台灣微軟、支點雲端共兩次的實習經驗，並且在臺大資管系上有一年半的網管與網站開發經驗。"
        ),
        array(
            'type' => 'text',
            'text' => "點擊下方按鈕來問我更加詳細的經歷吧↓↓",
            'quickReply' => QuickIntro()
        )
    );
    return $re;
}

function GetIntroInfo($introType)
{
    switch ($introType) {
        case 'ms':
            $re = array(
                array(
                    'type' => 'text',
                    'text' => "大四整年在台灣微軟實習的企業服務事業群擔任研發助理，主要工作內容如下："
                ),
                array(
                    'type' => 'text',
                    'text' => "● 外派支援\n".
                              "到台積電進行網頁開發支援，利用 75% 的工作時程完成原先預定 2 倍的工作量"
                ),
                array(
                    'type' => 'text',
                    'text' => "● 參與專案\n".
                              "參與 3 項 B2B 專案，分別是 Chatbot 開發、資料庫維護與 PowerShell Scripts 撰寫"
                ),
                array(
                    'type' => 'text',
                    'text' => "● 撰寫POC\n".
                              "先後撰寫了手機語音訂票服務與 Chatbot 的 POC，成功讓公司拿下 2 個標案",
                    'quickReply' => QuickIntro()
                )
            );
            break;
        
        case '3people':
            $re = array(
                array(
                    'type' => 'text',
                    'text' => "大二暑假時在支點雲端擔任軟體工程實習生，在實習期間做了以下這些事情："
                ),
                array(
                    'type' => 'text',
                    'text' => "● 後端開發\n".
                              "以 Google 服務在原雲端愛上課的系統下，外接一套可供師生互相問答的系統"
                ),
                array(
                    'type' => 'text',
                    'text' => "● 專案支援\n".
                              "支援公司專案，撰寫爬蟲爬取網路資料以及建立答題試卷模組",
                    'quickReply' => QuickIntro()
                )
            );
            break;
        
        case 'ntuim':
            $re = array(
                array(
                    'type' => 'text',
                    'text' => "大學時曾有一年半的時間擔任了資管系上[線上批改系統]的網管與開發人員\n".
                              "從只會語法的見習工程師漸漸轉職成網頁開發人員，做過的事蹟如下："
                ),
                array(
                    'type' => 'text',
                    'text' => "● 網頁開發\n".
                              "主導前後端新功能開發與日常網站維護工作"
                ),
                array(
                    'type' => 'text',
                    'text' => "● 系統擴充\n".
                              "將系統擴充成可支援多個課程同時使用，目前已提供 14 門課、1700 多位使用者使用"
                ),
                array(
                    'type' => 'text',
                    'text' => "● 硬體維護\n".
                              "負責網站伺服器備份、搬遷與建置作業",
                    'quickReply' => QuickIntro()
                )
            );
            break;
        
        case 'cmlab':
            $re = array(
                array(
                    'type' => 'text',
                    'text' => "我的研究項目主要是在人機互動 (HCI) 相關領域，著重於 Tangible Device with RFID"
                ),
                array(
                    'type' => 'text',
                    'text' => "目前一共投過三篇期刊，分別是：\n".
                              "● RFIGrass:\n".
                              "● RFTouchPads:Wireless Modular Touch Sensor Pads Based on RFID\n".
                              "● RFIWall:A Vertical Touchscreen That Supports Rich-ID Stacking",
                    'quickReply' => QuickIntro()
                )
            );
            break;
        
        case 'award':
            $re = array(
                array(
                    'type' => 'text',
                    'text' => "大學就讀台大資管系，平均 GPA 為 3.98 (滿分 4.3)，一共得過 2 次書卷獎\n".
                              "碩一上學期 GPA 為 3.75 (滿分 4.3)"
                ),
                array(
                    'type' => 'text',
                    'text' => "修習[智慧對話機器人]課程時利用 NLP 技術開發出能以自然語言互動的 Music Chatbot，並且獲得期末小組專案\"第一名\"的殊榮",
                    'quickReply' => QuickIntro()
                )
            );
            break;
        
        default:
            error_log("Unsupporeted skill type: " . $skillType);
            break;
    }

    
    return $re;
}

function QuickIntro()
{
    $re = array(
        'items' => array(
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'postback',
                    'label' => '台灣微軟實習',
                    'data' => "intent=introduction&introType=ms",
                    'displayText' => RandomExperienceText("台灣微軟")
                )
            ),
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'postback',
                    'label' => '支點雲端實習',
                    'data' => "intent=introduction&introType=3people",
                    'displayText' => RandomExperienceText("支點雲端")
                )
            ),
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'postback',
                    'label' => '學校經歷',
                    'data' => "intent=introduction&introType=ntuim",
                    'displayText' => RandomExperienceText("學校")
                )
            ),
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'postback',
                    'label' => '研究項目',
                    'data' => "intent=introduction&introType=cmlab",
                    'displayText' => RandomResearchText()
                )
            ),
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'postback',
                    'label' => '課業成就',
                    'data' => "intent=introduction&introType=award",
                    'displayText' => RandomAwardsText()
                )
            )
        )
    );
    return $re;
}

function RandomExperienceText($topic)
{
    $re = array(
        "你在". $topic ."做了哪些事呢？",
        "聊聊你在". $topic ."的經驗吧",
        "分享一下你在". $topic ."的經歷"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}

function RandomResearchText()
{
    $re = array(
        "你在實驗室都做了些什麼？",
        "你的研究項目是什麼呢？",
        "在實驗室都做些什麼研究？"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}

function RandomAwardsText()
{
    $re = array(
        "課業方面有什麼成就嗎？",
        "聊聊你在課業上的豐功偉業吧",
        "你在課業方面如何？"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}
