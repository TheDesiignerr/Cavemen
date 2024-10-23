<?php

function apiGet() {
    require_once 'imageApi.php';

    $apiRes = array(
        'itemName' => '',
        'itemDesc' => '',
        'itemImage' => '',
        'itemRarity' => '',
        'itemColor' => ''
    );

    $rand = rand(0, 100);

    switch (true) {
        // Legendary
        case $rand <= 2:
            $apiRes['itemName'] = 'Diamond';
            $apiRes['itemDesc'] = 'NO WAYYYYYY!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Legendary';
            $apiRes['itemColor'] = '0x47eaff';
            return $apiRes;

        // Epic
        case $rand <= 7:
            $apiRes['itemName'] = 'Fishing rod';
            $apiRes['itemDesc'] = 'Oh wow, Now you can fish!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Epic';
            $apiRes['itemColor'] = '0x4f3e2f';
            return $apiRes;

        case $rand <= 10:
            $apiRes['itemName'] = 'Furnace';
            $apiRes['itemDesc'] = 'Smells like ore in here, let us smelt some more!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Epic';
            $apiRes['itemColor'] = '0x545454';
            return $apiRes;

        // Rare
        case $rand <= 20:
            $apiRes['itemName'] = 'Cake';
            $apiRes['itemDesc'] = 'Someone is about to blow candles!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Rare';
            $apiRes['itemColor'] = '0xffcca6';
            return $apiRes;

        case $rand <= 35:
            $apiRes['itemName'] = 'Gold';
            $apiRes['itemDesc'] = 'I AM RICH!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Rare';
            $apiRes['itemColor'] = '0xffd447';
            return $apiRes;

        case $rand <= 37:
            $apiRes['itemName'] = 'Daisy';
            $apiRes['itemDesc'] = 'Hmm, I am sure I can give this to someone!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Rare';
            $apiRes['itemColor'] = '0xffffdb';
            return $apiRes;

        // Uncommon
        case $rand <= 45:
            $apiRes['itemName'] = 'Iron';
            $apiRes['itemDesc'] = 'This looks so shiny!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Uncommon';
            $apiRes['itemColor'] = '0xc4c4c4';
            return $apiRes;

        // Common
        case $rand <= 55:
            $apiRes['itemName'] = 'Poppy';
            $apiRes['itemDesc'] = 'You can give this to someone special!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0xd10000';
            return $apiRes;

        case $rand <= 60:
            $apiRes['itemName'] = 'Coal';
            $apiRes['itemDesc'] = 'This will come in handy!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0x402d2d';
            return $apiRes;

        case $rand <= 65:
            $apiRes['itemName'] = 'Apple';
            $apiRes['itemDesc'] = 'Newton?!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0x9e0000';
            return $apiRes;

        case $rand <= 70:
            $apiRes['itemName'] = 'Sweet berries';
            $apiRes['itemDesc'] = 'Damn it, I wanted blueberry!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0x9e0000';
            return $apiRes;

        case $rand <= 75:
            $apiRes['itemName'] = 'Stone';
            $apiRes['itemDesc'] = 'ooo, we are getting closer!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0x6b6b6b';
            return $apiRes;

        case $rand <= 80:
            $apiRes['itemName'] = 'Snowball';
            $apiRes['itemDesc'] = 'I think I can throw this at someone...';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0x6b6b6b';
            return $apiRes;

        case $rand <= 85:
            $apiRes['itemName'] = 'Egg';
            $apiRes['itemDesc'] = 'I should crack this on someone...';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0x6b6b6b';
            return $apiRes;

        // Default Common
        default:
            $apiRes['itemName'] = 'Dirt';
            $apiRes['itemDesc'] = 'Good old dirt block!';
            $apiRes['itemImage'] = getImage($apiRes['itemName']);
            $apiRes['itemRarity'] = 'Common';
            $apiRes['itemColor'] = '0x402d2d';
            return $apiRes;
    }
}