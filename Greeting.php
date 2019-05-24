<?php

function RandomHello()
{
    $msg = array(
        "嗨~:)",
        "你好!",
        "Hello!",
        "Hi",
        "喵OωO",
        "哈囉~",
        "您好",
        "嗨嗨嗨",
        "安安",
        "嘿",
        "阿囉哈"
    );
    $sticker = array(
        "52002735",
        "52002739",
        "52002741",
        "52002745",
        "52002748",
        "52002752",
        "52002768",
        "52002762",
        "52002736",
        "52002738",
        "52002734"
    );
    $seed = rand(0, sizeof($msg)-1);

    $re = array(
        array(
            'type' => 'text',
            'text' => $msg[$seed]
        ),
        array(
            'type' => 'sticker',
            'packageId' => '11537',
            'stickerId' => $sticker[$seed]
        )
    );
    return $re;
}

function RandomBye()
{
    $msg = array(
        "掰掰-w-",
        "掰!OωO",
        "Bye~AwA",
        "再見OuO/",
        "下次見///"
    );

    $seed = rand(0, sizeof($msg)-1);

    $re = array(
        array(
            'type' => 'text',
            'text' => $msg[$seed]
        )
    );
    return $re;
}

function RandomSticker()
{
    $sticker = array(
        "52002735",
        "52002739",
        "52002741",
        "52002745",
        "52002748",
        "52002752",
        "52002768",
        "52002762",
        "52002736",
        "52002738",
        "52002734"
    );
    $seed = rand(0, sizeof($sticker)-1);

    $re = array(
        array(
            'type' => 'sticker',
            'packageId' => '11537',
            'stickerId' => $sticker[$seed]
        )
    );
    return $re;
}
