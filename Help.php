<?php

function GetHelp()
{
    $re = array(
        array(
            'type' => 'text',
            'text' => "我是受雇於盧慶原的工讀Bot，負責幫他 promote 他自己 O~O\n".
                      "或許你可以考慮...↓↓",
            'quickReply' => QuickHelp()
        )
    );
    return $re;
}

function QuickHelp()
{
    $re = array(
        'items' => array(
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'message',
                    'label' => '問問自介',
                    'text' => RandomHelpIntro()
                )
            ),
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'message',
                    'label' => '了解技能',
                    'text' => RandomHelpSkill()
                )
            ),
            array(
                'type' => 'action',
                'action' => array(
                    'type' => 'message',
                    'label' => '看看作品',
                    'text' => RandomHelpPortfolio()
                )
            )
        )
    );
    return $re;
}

function RandomHelpIntro()
{
    $re = array(
        "那就來個自介如何？",
        "介紹一下你自己吧",
        "自我介紹一下？"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}

function RandomHelpSkill()
{
    $re = array(
        "你會哪些專業技能啊？",
        "會啥技能？",
        "點了哪些工程師技能XD？"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}

function RandomHelpPortfolio()
{
    $re = array(
        "給我看看你有哪些作品",
        "有作品集可以看嗎？",
        "秀一下你的作品吧"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}
