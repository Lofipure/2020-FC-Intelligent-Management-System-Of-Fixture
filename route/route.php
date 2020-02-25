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
Route::get('/','@admin/Index/drawLoginPage');
Route::post('/login','@admin/Index/handleLogin');

# Admin 页面的相关路由
Route::get('/admin','@admin/Admin/drawMainPage');
Route::post('/admin/addNew','@admin/Admin/addNewUser');
Route::get('/admin/modify/:username','@admin/Admin/modifyUser');
Route::post('/admin/handelModify','@admin/Admin/handelModify');
Route::get('/admin/delete/:username','@admin/Admin/deleteUser');

# OperatorI 页面的相关路由
Route::get('/operatori/:username','@operatori/Operatori/showMainPage');
Route::post('/operatori/addNew','@operatori/Operatori/addNew');
Route::get('/operatori/submitApp/:code/:username','@operatori/Operatori/submitRepairApplication');
Route::get('/operatori/handelApp/:code/:retusername','@operatori/Operatori/handelIeStatus');
Route::get('/operatori/seeAllRecord/:workcell','@operatori/Operatori/seeAllRecord');

# OperatorII 页面的相关路由
Route::get('/operatorii/:username','@operatorii/Operatorii/showMainPage');
Route::get('/operatorii/handelRepair/:code/:username','@operatorii/Operatorii/handelRepair');
Route::get('/operatorii/finishRepair/:code/:username','@operatorii/Operatorii/finishRepair');
Route::get('/operatorii/ierecord/:workcell','@operatorii/Operatorii/seeAllIeRecord');
Route::get('/operatorii/showRepair/:workcell','@operatorii/Operatorii/showRepairRecord');
Route::get('/operatorii/postDestory/:code/:username','@operatorii/Operatorii/postDestory');

# Supervisor 页面的相关路由
Route::get('/supervisor/:username','@supervisor/Supervisor/showMainPage');
Route::get('/supervisor/ierecord/:workcell','@supervisor/Supervisor/seeAllIeRecord');
Route::get('/supervisor/rerecord/:workcell','@supervisor/Supervisor/showRepairRecord');
Route::get('/supervisor/trialDestory/:code/:username','@supervisor/Supervisor/trialDestory');
Route::get('/supervisor/browseDestoryRecord/:username','@supervisor/Supervisor/browseDestoryRecord');
Route::get('/supervisor/handelAdd/:code/:username','@supervisor/Supervisor/handelAdddNew');
Route::get('/supervisor/showAddRecord/:username','@supervisor/Supervisor/showAddRecord');

# Manager 页面的相关路由
Route::get('/manager/:username','@manager/Manager/showMainPage');
Route::get('/manger/destory/:code/:username','@manager/Manager/destoryTool');
Route::get('/manager/Manager/:code/:username','@manager/Manager/addNewTool');
Route::get('/manager/showDestoryRecord/:username','@manager/Manager/showDestoryRecord');
Route::get('/manager/showAddRecord/:username','@manager/Manager/showAddRecord');
Route::get('/manager/showIeRecord/:username','@manager/Manager/showIeRecord');
Route::get('/manager/showRequireRecord/:username','@manager/Manager/showRequireRecord');
Route::get('/manager/addNew/:code/:username','@manager/Manager/addNew');

# Normal 页面的相关路由
Route::get('/normal/:username','@normal/Normal/showMainPage');
Route::get('/normal/lend/:code/:username','@normal/Normal/lendTool');
Route::get('/normal/returntool/:code/:username','@normal/Normal/returnTool');


return [

];
