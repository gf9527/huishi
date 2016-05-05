<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 *
 * Class Company
 */
class Company extends CI_Controller
{
	public static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Company_model', 'company');
	}

	/**
	 * 公司信息
	 */
	public function index()
	{
		$cId = false;
		$info = $this->company->getInfo($cId);
		self::$view_data['info'] = $info;
		$this->load->view('admin/company/edit',self::$view_data);
	}

	/**
	 * 执行修改
	 */
	public function doedit()
	{
		$cId = intval($this->input->post('cId'));
		$companyName = trim($this->input->post('companyName'));
		$contents = $this->input->post('contents');
		$email = trim($this->input->post('email'));
		$phoneNumber = $this->input->post('phoneNumber');
		$companyQQ = $this->input->post('companyQQ');
		$wechat = trim($this->input->post('wechat'));
		$weibo = trim($this->input->post('weibo'));
		$address = trim($this->input->post('address'));
		$updateArr = array(
			'companyName' => $companyName,
			'contents' => $contents,
			'email' => $email,
			'phoneNumber' => $phoneNumber,
			'companyQQ' => $companyQQ,
			'wechat' => $wechat,
			'weibo' => $weibo,
			'address' => $address,
		);
		$bool = $this->company->updateData($updateArr , $cId);
		redirect('admin/Company/index');

	}
}
