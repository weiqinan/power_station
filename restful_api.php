<?php
global $app;
global $response_body;
$request_body = $app->request->getBody();

//API返回码
define("RES_SUCCESS", 0); 
define("RES_ERROR", 1); 
define("RES_NEED_LOGIN", 2); 
define("RES_NO_AUTH", 3); 
define("RES_PARAM_ERROR", 4);
define("RES_PARAM_EMPTY", 5);
define("RES_PARAM_TYPE_ERROR", 6);
define("RES_ACCOUNT_EXIST", 10001); 
define("RES_ACCOUNT_PASSWORD_ERROR", 10002); 
define("RES_ACCOUNT_NOT_EXIST", 10003);

define("RES_USER_HAS_IN_PROJECT", 20001);  


//http接口返回
function restful_response($code,$data=array()) {
 echo json_encode(array(
	'code'=>$code,
	'data'=>$data,
 ));
 }

//参数合法性检测
function param_check($key,$method='post',$type='',$empty = false){
	global $app;
	if($method == 'post'){
		$val = $app->request->post($key);
	}else{
		$val = $app->request->get($key);
	}
	if(!$empty){
		if($val == '' || $val == NULL){
			restful_response(RES_PARAM_EMPTY,array('PARAM_EMPTY'=>$key));
			die();
			return;
		}
	}
	
	if($type == 'number'){
		if(!is_numeric($val)){
			restful_response(RES_PARAM_EMPTY,array('RES_PARAM_TYPE_ERROR'=>$key));
			die();
		}
	}
	return $val;
 }
 
 function param_check_get($key,$type=''){
	return param_check($key,'get',$type);
 }
 
 function param_check_post($key,$type=''){
	return param_check($key,'post',$type);
 }
 
 //API登陆身份验证
 function restful_api_auth(){
	$result = AccountHandler::is_login();
	if(!$result){
		restful_response(RES_NEED_LOGIN,array('RES_NEED_LOGIN'=>true));
		die();
	}
 }
 

 //增加账户
$app->post('/account/add', function () {
	restful_api_auth();
	$accountName = param_check('name');
    $accountPassword = param_check('password');
	$accountType = param_check('type');
    $result = AccountHandler::add($accountName,$accountPassword,$accountType);
	if($result){
	   restful_response(RES_SUCCESS,array('id'=>$result));
	}else{
	   restful_response(RES_ACCOUNT_EXIST);
	}
	
});

//彻底删除一个账户（危险慎用）
$app->post('/account/remove', function () {
	restful_api_auth();
	$accountId = param_check('user_id');
    $result = AccountHandler::remove($accountId);
	restful_response(RES_SUCCESS);
});


//更新账户信息
$app->post('/account/updateinfo', function () {
	$accountId = param_check('user_id');
	$accountType = param_check('type');
	$project_add_id = param_check('project_add_id','post','',true);
	$project_remove_id = param_check('project_remove_id','post','',true);
	if($project_add_id){
		$project_add_id = explode(',',$project_add_id);
	}
	
	if($project_remove_id){
		$project_remove_id = explode(',',$project_remove_id);
	}
	$accountId = intval($accountId);
	$accountType = intval($accountType);
	AccountHandler::updateUserInfo($accountId,$accountType,$project_add_id,$project_remove_id);
	restful_response(RES_SUCCESS);
});

//账户登录
$app->post('/account/signin', function () {
	$accountName = param_check('name');
    $accountPassword = param_check('password');
	$result = AccountHandler::sign_in($accountName,$accountPassword);
	global $app;
	$expire_time = time() + 7200;
	$app->setCookie('user_id', $result['data']->accountId,$expire_time );
	$app->setCookie('user_name', $result['data']->accountName,$expire_time);
	$app->setCookie('pass_token', $result['pass_token'],$expire_time);
	
	if($result == 1){
		restful_response(RES_ACCOUNT_NOT_EXIST);
	}else if($result == 2){
		restful_response(RES_ACCOUNT_PASSWORD_ERROR);
	}else{
		restful_response(RES_SUCCESS);
	}
});

//是否登录判断
$app->get('/account/islogin', function () {
    $result = AccountHandler::is_login();
	if($result){
		restful_response(RES_SUCCESS,array('login'=>true));
	}else{
		restful_response(RES_NEED_LOGIN,array('login'=>false));
	}
});

//账户登出
$app->get('/account/logout', function () {
     global $app;
	 $use_id = $_COOKIE['user_id'];
	 $app->deleteCookie('user_id');
	 $app->deleteCookie('pass_token');
	 
	 session_start();
	 unset($_SESSION['user_login'.$use_id]);
	 restful_response(RES_SUCCESS);
});

//锁定账户
$app->post('/account/lock', function () {
	restful_api_auth();
	$accountName = param_check('name');
    AccountHandler::change_account_status(1,$accountName);
	restful_response(RES_SUCCESS);
});


//解锁账户
$app->post('/account/unlock', function () {
	restful_api_auth();
	$accountName = param_check('name');
    AccountHandler::change_account_status(0,$accountName);
	restful_response(RES_SUCCESS);
});


//获得注册账户列表
$app->get('/account/list', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$end = param_check_get('end');
    $data = AccountHandler::get_list($start,$end);
	restful_response(RES_SUCCESS,$data);
});

//获得注册账户列表 同时获得这个用户所在的项目
$app->get('/account/list_with_project', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$end = param_check_get('end');
    $data = AccountHandler::get_list_with_project($start,$end);
	restful_response(RES_SUCCESS,$data);
});

//给用户添加项目权限(单个项目)
$app->post('/account/addproject', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
    $res = AccountHandler::add_to_project($user_id,$project_id);
	if($res){
		restful_response(RES_SUCCESS);
	} else {
		restful_response(RES_USER_HAS_IN_PROJECT);
	}
});

//给用户添加项目权限（批量更新）
$app->post('/account/addproject_mass', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
	$project_arr = explode(',',$project_id);
	
	for($i=0;$i<count($project_arr);$i++){
	   AccountHandler::add_to_project($user_id,$project_arr[$i]);
	}
	restful_response(RES_SUCCESS);
});

//给用户的项目权限删除(单个项目)
$app->post('/account/removeproject', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
    $res = AccountHandler::remove_from_project($user_id,$project_id);
	if($res){
		restful_response(RES_SUCCESS);
	} else {
		restful_response(RES_USER_HAS_IN_PROJECT);
	}
});

//给用户的项目权限删除(批量更新)
$app->post('/account/removeproject_mass', function () {
	restful_api_auth();
	$user_id = param_check('user_id');
	$project_id = param_check('project_id');
	$project_arr = explode(',',$project_id);
	
	for($i=0;$i<count($project_arr);$i++){
	   AccountHandler::remove_from_project($user_id,$project_arr[$i]);
	}
	restful_response(RES_SUCCESS);
});




//获得用户的项目权限
$app->get('/account/getproject', function () {
	restful_api_auth();
	$user_id = param_check_get('user_id');
    $data = AccountHandler::get_user_project($user_id);
	restful_response(RES_SUCCESS,$data);
});



//ecu文件读取的测试接口
$app->get('/ecu/read', function () {
	//restful_api_auth();
	$result = ECUHandler::read();
	restful_response(RES_SUCCESS,$result);
});

//扫描上传ECU文件的目录
$app->get('/ecu/scan', function () {
	restful_api_auth();
	$result = ECUHandler::scan();
	restful_response(RES_SUCCESS,$result);
});

//扫描上传ECU文件的目录
$app->get('/ecu/write', function () {
	restful_api_auth();
	$result = ECUHandler::write();
	restful_response(RES_SUCCESS,$result);
});

//增加一个基站站点
$app->post('/station/add', function () {
	restful_api_auth();
	$stationName = param_check('name');
	$stationSeriseCode = param_check('code');
	$stationType = param_check('type');
	$stationProject = param_check('project');
	$stationProjectId = param_check('project_id');
	$stationProvince = param_check('province');
	$stationCity = param_check('city');
	$stationDistirct = param_check('distirct');
	$stationAddress = param_check('address');
	$stationLat = param_check('lat');
	$stationLng = param_check('lng');
	
	$result = StationHandler::add(
		$stationName,
		$stationSeriseCode,
		$stationType,
		$stationProject,
		$stationProvince,
		$stationCity,
		$stationDistirct,
		$stationAddress,
		$stationLat,
		$stationLng,
		$stationProjectId);
		
	restful_response(RES_SUCCESS);
});

//基站列表
$app->get('/station/list', function () {
	restful_api_auth();
	$start = param_check_get('start');
	$end = param_check_get('end');
	$data = StationHandler::get_list($start,$end);
	restful_response(RES_SUCCESS,$data);
});

//删除基站
$app->post('/station/online', function () {
	restful_api_auth();
	$stationId = param_check('id');
	StationHandler::update($stationId,0);
	restful_response(RES_SUCCESS);
});

//恢复基站
$app->post('/station/offline', function () {
	restful_api_auth();
	$stationId = param_check('id');
	StationHandler::update($stationId,1);
	restful_response(RES_SUCCESS);
});

//新建项目
$app->post('/project/add', function () {
	restful_api_auth();
	$name = param_check('name');
	ProjectHandler::add($name);
	restful_response(RES_SUCCESS);
});

//项目列表
$app->get('/project/list', function () {
	restful_api_auth();
	$data = ProjectHandler::get_list();
	restful_response(RES_SUCCESS,$data);
});

//删除项目
$app->post('/project/remove', function () {
	restful_api_auth();
	$id = param_check('id');
	ProjectHandler::remove($id);
	restful_response(RES_SUCCESS);
});

//显示天气
$app->get('/weather/show', function () {
     global $app;
     $result=WeatherHandler::show();
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});

//插入天气
$app->post('/weather/add', function () {
     global $app;
     $result=WeatherHandler::add_weather();
     if(!$result){
          restful_response(RES_ERROR);
     }else{
          restful_response(RES_SUCCESS,$result);
     }
	
});
?>