<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	private $table = 'cm_user';
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 验证用户名与密码登录
	 * @author  gf
	 * @param $username
	 * @param $password
	 * @return mixed
	 */
	public function check($username , $password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$res = $this->db->get($this->table)->row_array();
		echo $this->db->last_query();
		return $res;
	}
}
