<?php

$app->get('/', ['uses' => 'ForburyController@index']);
$app->post('calculate', ['uses' => 'ForburyController@calculate']);
