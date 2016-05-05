<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/User_model', 'user');
	}

	/**
	 * 用户列表
	 */
	public function index()
	{
		$condition = array();
		$param = array();
		$limit = 16;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$count = $this->user->getCount($condition);
		$parampage = $this->publicmodel->dealparam($param);
		$this->publicmodel->create_page('admin/User/index', $count, $limit ,4);
		$userlist = $this->user->getList($condition , $limit , $start);
		self::$view_data['list'] = $userlist;
		self::$view_data['count'] = $count;
		self::$view_data['parampage'] = $parampage;
		$this->load->view('admin/user/list',self::$view_data);
	}
	/**
	 * 添加用户
	 */
	public function add()
	{
		$this->load->view('admin/user/add',self::$view_data);
	}

	/**
	 * 执行入库
	 */
	public function doadd()
	{
		$username = trim($this->input->post('username'));
		$password = md5($this->input->post('passwordS'));
		$email = trim($this->input->post('email'));
		$realName = trim($this->input->post('realName'));
		$addArr = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'realName' => $realName,
			'createTime' => time()
		);
		$this->user->addData($addArr);
		redirect('admin/User/index');
	}

	/**
	 * 执行编辑
	 */
	public function edit($UId)
	{
		$UId = intval($UId);
		$condition['UId'] = $UId;
		$info = $this->user->getInfo($condition);
		self::$view_data['info'] = $info;
		$this->load->view('admin/User/edit',self::$view_data);
	}

	/**
	 * 执行入库
	 */
	public function doedit()
	{
		$UId  = intval($this->input->post('UId'));
		$username = trim($this->input->post('username'));
		$password = md5($this->input->post('passwordS'));
		$realName = trim($this->input->post('realName'));
		$email = trim($this->input->post('email'));
		$updateArr = array(
			'username' => $username,
			'password' => $password,
			'realName' => $realName,
			'email' => $email,
		);
		$this->user->updateData($updateArr,$UId);
		$this->session->sess_destroy();
		echo '<script>alert("修改成功，请重新登录");window.location.href="'.$this->config->item("base_url").'/Login"</script>';
	}
	/**
	 * 效验用户名
	 */
	public function ajaxUser()
	{
		$res = array('err'=>0);
		$condition = array();
		$username = trim($this->input->post('username'));
		$condition['username'] = $username;
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}

	/**
	 * 效验邮箱
	 */
	public function ajaxEmail()
	{
		$res = array('err'=>0);
		$condition = array();
		$email = trim($this->input->post('email'));
		$condition['email'] = $email;
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}

	/**
	 * 效验密码
	 */
	public function ajaxPass()
	{
		$res = array('err'=>0);
		$condition = array();
		$password = $this->input->post('password');
		$condition['username'] = $this->input->post('username');
		$condition['password'] = md5($password);
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}

	public function changeWord()
	{
		$this->load->view('admin/changeword',self::$view_data);
	}
}
