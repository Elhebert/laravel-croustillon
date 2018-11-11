<?php

Route::post('/', 'CookiesController')->name('croustillon.cookies.store');
Route::get('/policy', 'CookiePolicyController')->name('croustillon.policy.view');
