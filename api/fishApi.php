<?php

function getFish() {
    $apiRes = array(
        'ItemName'=>'',
        'itemDesc'=>'',
        'itemImage'=>'',
        'itemColor'=>''
    );

    $rand = rand(0, 4 - 1);

    switch (true) {

        case $rand <= 1:
            $apiRes['itemName'] = 'Cod';
            $apiRes['itemDesc'] = 'Sounds fishy...';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemColor'] = '0xc7ad95';

            return $apiRes;
            break;

        case $rand <= 2:
            $apiRes['itemName'] = 'Salmon';
            $apiRes['itemDesc'] = 'That is a nice color';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemColor'] = '0xdb8686';

            return $apiRes;
            break;

        case $rand <= 3:
            $apiRes['itemName'] = 'Pufferfish';
            $apiRes['itemDesc'] = 'Yooo, that is spiky!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemColor'] = '0xffc670';

            return $apiRes;
            break;
    }
};