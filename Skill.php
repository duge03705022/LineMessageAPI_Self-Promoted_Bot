<?php

function GetSkillType()
{
    $re = array(
        array(
            'type' => 'template',
            'altText' => "This is a buttons template",
            'template' => array(
                'type' => 'buttons',
                'text' => "我在資訊方面的專業能力可以分為以下幾個面向：",
                'actions' => array(
                    array(
                        'type' => 'postback',
                        'label' => 'Web Development',
                        'data' => "intent=skill&skillType=web",
                        'displayText' => RandomSkillText("Web Development")
                    ),
                    array(
                        'type' => 'postback',
                        'label' => 'Data Analysis',
                        'data' => "intent=skill&skillType=data",
                        'displayText' => RandomSkillText("Data Analysis")
                    ),
                    array(
                        'type' => 'postback',
                        'label' => 'Machine Learning',
                        'data' => "intent=skill&skillType=ml",
                        'displayText' => RandomSkillText("Machine Learning")
                    ),
                    array(
                        'type' => 'postback',
                        'label' => '其它',
                        'data' => "intent=skill&skillType=other",
                        'displayText' => "我想看看你會哪些其它的技能"
                    )
                )
            )
        )
    );
    return $re;
}

function GetSkillInfo($skillType)
{
    switch ($skillType) {
        case 'web':
            $msg = 
            "● PHP - CodeIgniter\n".
            "● C# - ASP .NET\n".
            "● SQL - MySQL, T-SQL\n".
            "● HTML\n".
            "● CSS - RWD\n".
            "● JavaScript - jQuery, Ajax";
            break;
        
        case 'data':
            $msg = 
            "● Python\n".
            "● R\n".
            "● SAS - EG, EM";
            break;
        
        case 'ml':
            $msg = 
            "● Python - TensorFlow, Keras, Scikit-Learn\n".
            "● R";
            break;
        
        case 'other':
            $msg = 
            "● Cloud Service\n".
            " - Azure VM, Cognitive Service\n".
            "● Chatbot\n".
            " - Microsoft Bot Framework\n".
            " - Line Message API\n".
            "● Hardware\n".
            " - Arduino\n".
            "● Software Development\n".
            " - Git";
            break;
        
        default:
            error_log("Unsupporeted skill type: " . $skillType);
            break;
    }

    $re = array(
        array(
            'type' => 'text',
            'text' => $msg
        )
    );
    return $re;
}

function RandomSkillText($topic)
{
    $re = array(
        "你會哪些 ". $topic ." 相關的技術？",
        "在 ". $topic ." 方面呢？",
        "說說 ". $topic ." 你會哪些技術吧"
    );
    $seed = rand(0, sizeof($re)-1);
    return $re[$seed];
}
