<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 方案中心
 * @author  gf
 * @time 2016/1/20
 * class News
 */
class Scheme extends CI_Controller
{
	private static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Scheme_model', 'scheme');
	}

	/**
	 * 方案主页
	 */
	public function index()
	{
		$condition =array();
		$param = array();
		$limit = 16;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$count = $this->scheme->getCount($condition);
		$parampage = $this->publicmodel->dealparam($param);
		$this->publicmodel->create_page('admin/Scheme/index', $count, $limit ,4);
		$schemelist = $this->scheme->getList($condition , $limit , $start);
		self::$view_data['list'] = $schemelist;
		self::$view_data['count'] = $count;
		self::$view_data['parampage'] = $parampage;
		$this->load->view('admin/scheme/list',self::$view_data);
	}

	/*
	 * 发布方案
	 */
	public function add()
	{
		$this->load->view('admin/scheme/add',self::$view_data);
	}

	/**
	 * 执行添加
	 */
	public function doadd()
	{
		$addArr = array();
		$addArr['title'] = trim($this->input->post('title'));
		$addArr['contents'] = trim($this->input->post('contents'));
		$addArr['createTime'] = time();
		$addArr['type'] = intval($this->input->post('type'));
		$addArr['editor'] = trim($this->input->post('editor'));
		$imageName = 'imageName';
		$fileName = $this->publicmodel->uploader($imageName);
		$addArr['imageName'] = $fileName;
		$newsId = $this->scheme->addData($addArr);
		redirect('admin/Scheme/index');
	}

	/**
	 * 编辑方案
	 * @param $sId
	 */
	public function edit($sId)
	{
		$sId = intval($sId);
		$info = $this->scheme->getInfo($sId);
		self::$view_data['info'] = $info;
		$this->load->view('admin/scheme/edit',self::$view_data);
	}

	/**
	 * 执行修改
	 */
	public function doedit()
	{
		$sId = intval($this->input->post('sId'));
		$title = trim($this->input->post('title'));
		$contents = trim($this->input->post('contents'));
		$createTime = time();
		$type = intval($this->input->post('type'));
		$editor = trim($this->input->post('editor'));
		$newsImgName = 'imageName';
		$fileName = $this->publicmodel->uploader($newsImgName);
		$imgName = trim($this->input->post('imgName'));
		if(!empty($fileName))
		{
			$filePath = './uploads/'.$imgName;
			if(!empty($filePath))
			{
				unlink($filePath);
			}
			$updateArr = array(
				'title' => $title,
				'contents' => $contents,
				'createTime' => $createTime,
				'editor' => $editor,
				'imageName' => $fileName,
				'type' => $type,
			);
			$bool = $this->scheme->updateData($updateArr , $sId);
		}
		else
		{
			$updateArr = array(
				'title' => $title,
				'contents' => $contents,
				'createTime' => $createTime,
				'editor' => $editor,
				'imageName' => $imgName,
				'type' => $type,
			);
			$bool = $this->scheme->updateData($updateArr , $sId);
		}
		redirect('admin/Scheme/index');

	}

	/**
	 * 删除
	 * @param $sId
	 * @param $imageName
	 */
	public function delete($sId , $imageName)
	{
		$sId = intval($sId);
		$imageName = trim($imageName);
		$filePath = './uploads/'.$imageName;
		if(!empty($imageName))
		{
			unlink($filePath);
			$this->scheme->deleteData($sId);
		}
		else
		{
			$this->scheme->deleteData($sId);
		}
		redirect('admin/Scheme/index');
	}
}