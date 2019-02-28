<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

//  GET   index 
//  GET   create  添加页面
//  POST   store   执行添加
//  PUT   update  执行修改
//  GET   edit    修改页面
//  DELETE   destroy 删除

// 文章
    $router->get('blogs','BlogsController@index');
    $router->get('blogs/create','BlogsController@create');
    $router->post('blogs','BlogsController@store');
    $router->get('blogs/{id}/edit','BlogsController@edit');
    $router->put('blogs/{id}','BlogsController@update');
    $router->delete('blogs/{id}','BlogsController@destroy');


// 标签
    $router->get('lab','LabController@index');
    $router->get('lab/create','LabController@create');
    $router->post('lab','LabController@store');
    $router->get('lab/{id}/edit','LabController@edit');
    $router->put('lab/{id}','LabController@update');
    $router->delete('lab/{id}','LabController@destroy');


// 分类
    $router->get('cat','CatController@index');
    $router->get('cat/create','CatController@create');
    $router->post('cat','CatController@store');
    $router->get('cat/{id}/edit','CatController@edit');
    $router->put('cat/{id}','CatController@update');
    $router->delete('cat/{id}','CatController@destroy');


// 活动
    $router->get('active','ActiveController@index');
    $router->get('active/create','ActiveController@create');
    $router->post('active','ActiveController@store');
    $router->get('active/{id}/edit','ActiveController@edit');
    $router->put('active/{id}','ActiveController@update');
    $router->delete('active/{id}','ActiveController@destroy');
    


});
