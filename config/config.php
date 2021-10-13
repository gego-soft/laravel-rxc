<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Rxccoind JSON-RPC Scheme
    |--------------------------------------------------------------------------
    | URI scheme of rxccoin Core's JSON-RPC server.
    |
    | Use https to enable SSL connections with Core,
    | but this is strongly discouraged by developers.
    |
    */

    'scheme' => env('RXCCOIND_SCHEME', 'http'),

    /*
    |--------------------------------------------------------------------------
    | Rxccoind JSON-RPC Host
    |--------------------------------------------------------------------------
    | Tells service provider which hostname or IP address
    | rxccoin Core is running at.
    |
    | If rxccoin Core is running on the same PC as
    | laravel project use localhost or 127.0.0.1.
    |
    | If you're running rxccoin Core on the different PC,
    | you may also need to add rpcallowip=<server-ip-here> to your rxccoin.conf
    | file to allow connections from your laravel client.
    |
    */

    'host' => env('RXCCOIND_HOST', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | Rxccoind JSON-RPC Port
    |--------------------------------------------------------------------------
    | The port at which rxccoin Core is listening for JSON-RPC connections.
    | Default is 8332 for mainnet and 18332 for testnet.
    | You can also directly specify port by adding rpcport=<port>
    | to rxccoin.conf file.
    |
    */

    'port' => env('RXCCOIND_PORT', 9332),

    /*
    |--------------------------------------------------------------------------
    | Rxccoind JSON-RPC User
    |--------------------------------------------------------------------------
    | Username needs to be set exactly as in rxccoin.conf file
    | rpcuser=<username>.
    |
    */

    'user' => env('RXCCOIND_USER', ''),

    /*
    |--------------------------------------------------------------------------
    | Rxccoind JSON-RPC Password
    |--------------------------------------------------------------------------
    | Password needs to be set exactly as in rxccoin.conf file
    | rpcpassword=<password>.
    |
    */

    'password' => env('RXCCOIND_PASSWORD', ''),

    /*
    |--------------------------------------------------------------------------
    | Rxccoind JSON-RPC Server CA
    |--------------------------------------------------------------------------
    | If you're using SSL (https) to connect to your rxccoin Core
    | you can specify custom ca package to verify against.
    | Note that using rxccoin JSON-RPC over SSL is strongly discouraged.
    |
    */

    'ca' => null,
];
