<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 *
 * Class Service
 */
class Service extends CI_Controller
{
	public static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Service_model', 'Service');
	}

	/**
	 * 服务信息
	 */
	public function index($sId = false)
	{
		$sId = intval($sId);
		if($sId = 0)
		{
			$sId = false;
		}

		$info = $this->Service->getInfo($sId);
		self::$view_data['info'] = $info;
		$this->load->view('admin/Service/system',self::$view_data);
	}

	/**
	 * 执行修改
	 */
	public function doedit()
	{
		$sId = intval($this->input->post('sId'));
		$title = trim($this->input->post('title'));
		$contents = $this->input->post('contents');

		$updateArr = array(
			'title' => $title,
			'contents' => $contents,
			'createTime' => time(),
		);
		$bool = $this->Service->updateData($updateArr , $sId);
		redirect('admin/Service/index');
	}
}
