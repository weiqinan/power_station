<?php
/**
 * Class that operate on table 'power_account'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerAccountMySqlExtDAO extends PowerAccountMySqlDAO{
	public function queryByAccountName($value){
		$sql = 'SELECT * FROM power_account_access_info WHERE account_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}
	
	public function updateAccountStatus($status,$account_name){
		$sql = 'UPDATE power_account SET status = ? WHERE account_name = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($status);
		$sqlQuery->set($account_name);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function updateAccountType($accountId,$accountType){
		$sql = 'UPDATE power_account SET accout_type = ? WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($accountType);
		$sqlQuery->setNumber($accountId);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function queryAndPage($start,$end){
		$sql = 'SELECT * FROM power_account limit '.$start.','.$end;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getTotalNum(){
		$sql_num = 'SELECT count(*) FROM power_account';
		$sqlQueryNum = new SqlQuery($sql_num);
		$num = $this->execute($sqlQueryNum);
		return $num[0][0];
	}
	
	public function deleteByAccountId($value){
		$sql = 'DELETE FROM power_account WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}
}
?>