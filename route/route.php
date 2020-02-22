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

/*
 * 项目重新部署：2020-2-21
 * 更改OperatorI和OperatorII的登录路由方式
 * */
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
# Manager 页面的相关路由



# Normal 页面的相关路由
Route::get('/normal/:username','@normal/Normal/showMainPage');
Route::get('/normal/lend/:code/:username','@normal/Normal/lendTool');
Route::get('/normal/returntool/:code/:username','@normal/Normal/returnTool');


return [

];
