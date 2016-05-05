<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 版本管理
 * @author  gf
 * @time 2016/1/20
 * class News
 */
class Edition extends CI_Controller
{
	private static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Edition_model', 'edition');
	}

	/*
	 * 发布
	 */
	public function index()
	{
		$eId = false;
		$info = $this->edition->getInfo($eId);
		self::$view_data['info'] = $info;
		$this->load->view('admin/Service/edition',self::$view_data);
	}

	/**
	 * 执行添加
	 */
	public function doadd()
	{
		$eId = intval($this->input->post('eId'));
		$number = trim($this->input->post('number'));
		$editionName = trim($this->input->post('editionName'));
		$contents = $this->input->post('contents');
		$filePath = 'filepath';
		$fileName = $this->publicmodel->uploadfile($filePath);
		$oldFile = $this->input->post('filepath');
		if(!empty($fileName))
		{
			$updateArr = array(
				'number' => $number,
				'editionName' => $editionName,
				'contents' => $contents,
				'createTime' => time(),
				'filepath' => $fileName,
			);
			$bool = $this->edition->updateData($updateArr , $eId);
			redirect('admin/Edition/index');
		}
		else
		{
			$updateArr = array(
				'number' => $number,
				'editionName' => $editionName,
				'contents' => $contents,
				'createTime' => time(),
				'filepath' => $oldFile,
			);
			$bool = $this->edition->updateData($updateArr , $eId);
			redirect('admin/Edition/index');
		}
	}
}