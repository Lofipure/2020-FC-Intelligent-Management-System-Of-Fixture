<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

# 登录页面的相关路由：将此功能规划在admin模块下
Route::get('/','@admin/Index/drawLoginPage')->name('loginPage');
Route::post('/login','@admin/Index/handleLogin')->name('login');

# Admin 页面的相关路由
Route::get('/admin','@admin/Admin/drawMainPage');
Route::post('/admin/addNew','@admin/Admin/addNewUser');
Route::get('/admin/modify/:username','@admin/Admin/modifyUser');
Route::post('/admin/handelModify','@admin/Admin/handelModify');
Route::get('/admin/delete/:username','@admin/Admin/deleteUser');


# OperatorI 页面的相关路由
Route::get('/operatori/:workcell','@operatori/Operatori/showMainPage');
Route::post('/operatori/addNew','@operatori/Operatori/addNew');
Route::get('/operatori/submitApp/:code','@operatori/Operatori/submitRepairApplication');
Route::get('/operatori/handelApp/:code','@operatori/Operatori/handelIeStatus');
Route::get('/operatori/seeAllRecord/:workcell','@operatori/Operatori/seeAllRecord');
# OperatorII 页面的相关路由
Route::get('/operatorii/:workcell','@operatorii/Operatorii/showMainPage');
Route::get('/operatorii/handelRepair/:code','@operatorii/Operatorii/handelRepair');
Route::get('/operatorii/finishRepair/:code','@operatorii/Operatorii/finishRepair');
# Supervisor 页面的相关路由



# Manager 页面的相关路由



# Normal 页面的相关路由
Route::get('/normal/:username','@normal/Normal/showMainPage');
Route::get('/normal/lend/:code/:username','@normal/Normal/lendTool');
Route::get('/normal/returntool/:code/:username','@normal/Normal/returnTool');


return [

];
