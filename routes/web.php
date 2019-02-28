<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// 首页
Route::get('/', 'IndexController@index')->name('index');

// 注册
Route::get('/register','UserController@register')->name('register');
Route::post('/register','UserController@doregister')->name('doregister');
// 手机验证码
Route::get('/sendcode','UserController@sendcode')->name('sendcode');
// 登录
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@dologin')->name('dologin');
// 退出
Route::get('/logout','UserController@logout')->name('logout');

// 文章
Route::get('/artlist','ArtController@artlist')->name('artlist');
// 发表文章
Route::get('/art','ArtController@art')->name('art');
Route::post('/art','ArtController@doart')->name('doart');
// 修改文章
Route::get('/artedit/{id}','ArtController@artedit')->name('artedit');
Route::post('/artedit/{id}','ArtController@doartedit')->name('doartedit');
// 删除文章
Route::get('/artdelete/{id}','ArtController@artdelete')->name('artdelete');
// 文章详情
Route::get('/artpage/{id}','ArtController@artpage')->name('artpage');
// 评论
Route::post('/comment/{id}','ArtController@comment')->name('comment');
// 删除评论
Route::get('/commdelete/{id}','ArtController@commdelete')->name('commdelete');
// 点赞
Route::get('/laud','ArtController@laud')->name('laud');

// 个人中心
Route::get('/porsonlist','PorController@porsonlist')->name('porsonlist');


// 社区主页
Route::get('/communityIndex','CommunityController@index')->name('communityindex');
// 社区发表
Route::get('/communityCreat','CommunityController@creat')->name('communitycreat');
Route::post('/communityStore','CommunityController@store')->name('communitystore');
// 修改
Route::get('/communityedit/{id}','CommunityController@communityedit')->name('communityedit');
Route::post('/communityupdate/{id}','CommunityController@communityupdate')->name('communityupdate');
// 删除
Route::get('/communitydelete/{id}','CommunityController@delete')->name('delete');
// 详情
Route::get('/communitylist/{id}','CommunityController@communitylist')->name('communitylist');
// 社区评论
Route::post('/communityComment/{id}','CommunityController@communityComment')->name('communityComment');
// 删除评论
Route::get('/commentdelete/{id}','CommunityController@commentdelete')->name('commentdelete');
// 社区点赞
Route::get('/communityZan','CommunityController@communityZan')->name('communityZan');



// 达人个人详情文章
Route::get('/userpage/{id}','IndexController@userpage')->name('userpage');

// 加关注
Route::post('/follow','FollowController@follow')->name('follow');

// 活动
Route::get('/activeIndex','ActiveController@activeIndex')->name('activeIndex');
// 活动详情
Route::get('/activelist/{id}','ActiveController@activelist')->name('activelist');
// 活动单页评论
Route::get('/activecomm/{id}','ActiveController@activecomm')->name('activecomm');
// 删除评论
Route::get('/activedelete/{id}','ActiveController@activedelete')->name('activedelete');


// 达人中心
Route::get('/darenIndex','DarenController@darenIndex')->name('darenIndex');

// 修改个人资料
Route::get('/userSet/{id}','PorController@userset')->name('userset');
Route::post('/userSet/{id}','PorController@douserset')->name('douserset');