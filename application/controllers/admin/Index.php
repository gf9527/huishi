<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 后台主页
 * Class Index
 */
class Index extends CI_Controller
{
	private static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Public_model','publicmodel');
		$this->publicmodel->checkUser();
		//  $this->load->model('Index_model','indexmodel');
		self::$view_data['header'] = $this->publicmodel->adminheader();
	}
	/**
	 * @author  gf
	 * 后台主页
	 */
	public function index()
	{
		$this->load->view('admin/index',self::$view_data);
	}

	public function insert()
	{
		$this->load->view('admin/insert',self::$view_data);
	}

	public function design()
	{
		$this->load->view('admin/design',self::$view_data);
	}

	public function system()
	{
		$this->load->view('admin/system',self::$view_data);
	}
}
