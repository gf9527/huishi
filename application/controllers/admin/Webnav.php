<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 官网导航
 * Class Navigate
 */
class Webnav extends CI_Controller
{
	public static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Webnav_model','webnav');
	}

	/**
	 * @author  gf
	 * 导航主页
	 */
	public function index()
	{
		$condition = array();
		$param = array();
		$limit = 16;
		$start = $this->uri->segment(4);
		$start = isset($start) ? $start : 0;
		$count = $this->webnav->getCount($condition);
		$this->publicmodel->create_page('amdin/Webnav/index',$count,$limit,4);
		$parampage = $this->publicmodel->dealparam($param);
		$navlist = $this->webnav->getList($condition , $limit ,$start);
		self::$view_data['navlist'] = $navlist;
		self::$view_data['parampage'] = $parampage;
		self::$view_data['count'] = $count;
		$this->load->view('admin/webnav/list.php',self::$view_data);
	}

	/**
	 * 添加导航页面
	 */
	public function add()
	{
		$this->load->view('admin/webnav/add.php',self::$view_data);
	}

	/*
	 * 执行入库
	 */
	public function doadd()
	{
		$keyword = trim($this->input->post('keyword'));
		$navName = trim($this->input->post('navName'));
		$navUrl = trim($this->input->post('navUrl'));
		$sort = intval($this->input->post('sort'));
		$addArr = array(
			'NavName' => $navName,
			'NavUrl' => $navUrl,
			'sort' => $sort,
			'keyword' => $keyword
		);
		$wId = $this->webnav->addData($addArr);
		if(!empty($wId))
		{
			redirect('admin/Webnav/index');
		}
		else
		{
			redirect('admin/Webnav/index');
		}
	}

	/**
	 * 编辑
	 * @param $NavId
	 */
	public function edit($wId)
	{
		$wId = intval($wId);
		$info = $this->webnav->getInfo($wId);
		self::$view_data['info'] = $info;
		$this->load->view('admin/webnav/edit',self::$view_data);
	}

	/**
	 * 执行修改
	 */
	public function doedit()
	{
		$wId = intval($this->input->post('wId'));
		$updateArr = array();
		$updateArr['keyword'] = trim($this->input->post('keyword'));
		$updateArr['navName'] = trim($this->input->post('navName'));
		$updateArr['navUrl'] = trim($this->input->post('navUrl'));
		$updateArr['sort'] = trim($this->input->post('sort'));
		$bool = $this->webnav->updateData($updateArr , $wId);
		if($bool)
		{
			redirect('admin/Webnav/index');
		}
		else
		{
			redirect('admin/Webnav/index');
		}
	}

	/**
	 * 删除
	 */
	public function delete($wId)
	{
		$wId = intval($wId);
		$bool = $this->webnav->deleteData($wId);
		if($bool)
		{
			redirect('admin/Webnav/index');
		}
		else
		{
			redirect('admin/Webnav/index');
		}
	}

	/**
	 * 添加栏目
	 */
	public function pAdd()
	{
		$this->load->view('admin/nav/padd', self::$view_data);
	}

	/**
	 * 执行入库
	 */
	public function doPadd()
	{
		$pNavName = trim($this->input->post('pNavName'));
		$pNavSort = intval($this->input->post('pNavSort'));
		$keyword = trim($this->input->post('keyword'));
		$addArr = array(
			'pNavName' => $pNavName,
			'pNavSort' => $pNavSort,
			'keyword' => $keyword
		);
		$pNavId = $this->nav->pAddData($addArr);
		if(!empty($pNavId))
		{
			redirect('admin/Navigate/index');
		}
		else
		{
			redirect('admin/Navigate/index');
		}
	}
}
