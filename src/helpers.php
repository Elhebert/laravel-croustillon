<?php

if (!function_exists('croustillon')) {
    function croustillon(): \Elhebert\Croustillon\Croustillon
    {
        return app(\Elhebert\Croustillon\Croustillon::class);
    }
}
