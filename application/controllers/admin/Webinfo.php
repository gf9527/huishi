<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 网站信息管理
 * Class Webinfo
 */
class Webinfo extends CI_Controller
{
	public static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Webinfo_model', 'web');
	}

	/**
	 * 网站信息
	 */
	public function index()
	{
		$wId = false;
		$webinfo = $this->web->getwebInfo($wId);
		self::$view_data['webinfo'] = $webinfo;
		$this->load->view('admin/webinfo/edit',self::$view_data);
	}

	/**
	 * 执行编辑网站信息
	 */
	public function doedit()
	{
		$wId = intval($this->input->post('wId'));
		$webUrl = trim($this->input->post('webUrl'));
		$title = trim($this->input->post('title'));
		$keyword = trim($this->input->post('keyword'));
		$email = trim($this->input->post('email'));
		$realname = trim($this->input->post('realname'));
		$phoneNumber = $this->input->post('phoneNumber');
		$recordNumber = intval($this->input->post('recordNumber'));
		$address = trim($this->input->post('address'));
		$newsImgName = 'imageName';
		$fileName = $this->publicmodel->uploader($newsImgName);
		$imgName = trim($this->input->post('imgName'));
		if($wId != 0)
		{
			if(!empty($fileName))
			{
				$filePath = './uploads/'.$imgName;
				if(!empty($filePath))
				{
					unlink($filePath);
				}
				$updateArr = array(
					'webUrl' => $webUrl,
					'title' => $title,
					'keyword' => $keyword,
					'email' => $email,
					'realname' => $realname,
					'phoneNumber' => $phoneNumber,
					'recordNumber' => $recordNumber,
					'address' => $address,
					'logoName' => $fileName,
				);
				$bool = $this->web->updateData($updateArr , $wId);
			}
			else
			{
				$updateArr = array(
					'webUrl' => $webUrl,
					'title' => $title,
					'keyword' => $keyword,
					'email' => $email,
					'realname' => $realname,
					'phoneNumber' => $phoneNumber,
					'recordNumber' => $recordNumber,
					'address' => $address,
					'logoName' => $imgName,
				);
				$bool = $this->web->updateData($updateArr , $wId);
			}
			redirect('admin/Webinfo/index');
		}
		else
		{
			$addArr = array(
				'webUrl' => $webUrl,
				'title' => $title,
				'keyword' => $keyword,
				'email' => $email,
				'realname' => $realname,
				'phoneNumber' => $phoneNumber,
				'recordNumber' => $recordNumber,
				'address' => $address,
				'logoName' => $fileName,
			);
			$webId = $this->web->addData($addArr);
			if(!empty($webId))
			{
				redirect('admin/Webinfo/index');
			}
			else
			{
				redirect('admin/Webinfo/index');
			}
		}

	}
}
