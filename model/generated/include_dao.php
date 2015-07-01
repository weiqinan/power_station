<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/PowerAccountDAO.class.php');
	require_once('class/dto/PowerAccount.class.php');
	require_once('class/mysql/PowerAccountMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerAccountMySqlExtDAO.class.php');
	require_once('class/dao/PowerAccountAccessInfoDAO.class.php');
	require_once('class/dto/PowerAccountAccessInfo.class.php');
	require_once('class/mysql/PowerAccountAccessInfoMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerAccountAccessInfoMySqlExtDAO.class.php');
	require_once('class/dao/PowerAmmeterDAO.class.php');
	require_once('class/dto/PowerAmmeter.class.php');
	require_once('class/mysql/PowerAmmeterMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerAmmeterMySqlExtDAO.class.php');
	require_once('class/dao/PowerAmmeterChinamobileDAO.class.php');
	require_once('class/dto/PowerAmmeterChinamobile.class.php');
	require_once('class/mysql/PowerAmmeterChinamobileMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerAmmeterChinamobileMySqlExtDAO.class.php');
	require_once('class/dao/PowerBaseStationDAO.class.php');
	require_once('class/dto/PowerBaseStation.class.php');
	require_once('class/mysql/PowerBaseStationMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerBaseStationMySqlExtDAO.class.php');
	require_once('class/dao/PowerBaseStationAnalysisDAO.class.php');
	require_once('class/dto/PowerBaseStationAnalysi.class.php');
	require_once('class/mysql/PowerBaseStationAnalysisMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerBaseStationAnalysisMySqlExtDAO.class.php');
	require_once('class/dao/PowerBaseStationDeviceInfoDAO.class.php');
	require_once('class/dto/PowerBaseStationDeviceInfo.class.php');
	require_once('class/mysql/PowerBaseStationDeviceInfoMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerBaseStationDeviceInfoMySqlExtDAO.class.php');
	require_once('class/dao/PowerBaseStationEnergyInfoDAO.class.php');
	require_once('class/dto/PowerBaseStationEnergyInfo.class.php');
	require_once('class/mysql/PowerBaseStationEnergyInfoMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerBaseStationEnergyInfoMySqlExtDAO.class.php');
	require_once('class/dao/PowerBaseStationLogDAO.class.php');
	require_once('class/dto/PowerBaseStationLog.class.php');
	require_once('class/mysql/PowerBaseStationLogMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerBaseStationLogMySqlExtDAO.class.php');
	require_once('class/dao/PowerBaseStationRuningDataDAO.class.php');
	require_once('class/dto/PowerBaseStationRuningData.class.php');
	require_once('class/mysql/PowerBaseStationRuningDataMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerBaseStationRuningDataMySqlExtDAO.class.php');
	require_once('class/dao/PowerStationWarningDAO.class.php');
	require_once('class/dto/PowerStationWarning.class.php');
	require_once('class/mysql/PowerStationWarningMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerStationWarningMySqlExtDAO.class.php');
	require_once('class/dao/PowerWeatherDAO.class.php');
	require_once('class/dto/PowerWeather.class.php');
	require_once('class/mysql/PowerWeatherMySqlDAO.class.php');
	require_once('class/mysql/ext/PowerWeatherMySqlExtDAO.class.php');

?>