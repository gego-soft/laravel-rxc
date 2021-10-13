<?php

if (! function_exists('rxccoind')) {
    /**
     * Get rxccoind client instance.
     *
     * @return \Gegosoft\Rxccoin\Client
     */
    function rxccoind()
    {
        return app('rxccoind');
    }
}
