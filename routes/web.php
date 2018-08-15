<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Use this file to register new routes for your application.
|
*/



// API homepage...
route('/','Welcome::index');

route()->prefix('v1', function(){

    // get all alerts
    route(['GET'],'alerts','Alerts::list');

    // create a new alert
    route(['POST'],'alerts','Alerts::add');

    // get the alert details
    route(['GET'],'alerts/{handle}','Alerts::get/$1');

    // save/edit existing alert
    route(['POST'],'alerts/{handle}','Alerts::edit/$1');

    // delete an alert
    route(['POST'],'alerts/delete/{handle}','Alerts::delete/$1');


    // get all activity records
    route(['GET'],'activity/{handle}','Activity::list/$1');

    // create a new activity record
    route(['POST'],'activity/{handle}','Activity::add/$1');

    // get the activity record details
    route(['GET'],'activity/{id}','Activity::get/$1');

    // dismiss all records
    route(['POST'],'activity/dismiss/{handle}','Activity::dismissAll/$1');

    // dismiss a record
    route(['POST'],'activity/dismiss/{id}','Activity::dismiss/$1');

    // delete an activity record
    route(['POST'],'activity/delete/{id}','Activity::delete/$1');

});
