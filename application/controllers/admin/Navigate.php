<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 导航管理
 * Class Navigate
 */
class Navigate extends CI_Controller
{
	public static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('Navigate_model','nav');
	}

	/**
	 * @author  gf
	 * 导航主页
	 */
	public function index()
	{
		$condition = array();
		$condition['deleteFlag'] = 0;
		$pnavlist = $this->nav->getNavList($condition);
		if(!empty($pnavlist)) foreach ($pnavlist as $k=>$v)
		{
			$param = array();
			$param['pNavId'] = $v['pNavId'];
			$pnavlist[$k]['sNavList'] = $this->nav->getSnavList($param);
		}
		self::$view_data['navlist'] = $pnavlist;
		$this->load->view('admin/nav/list.php',self::$view_data);
	}

	/**
	 * 添加导航页面
	 */
	public function add()
	{
		$condition = array();
		$condition['deleteFlag'] = 0;
		$pnavlist = $this->nav->getNavList($condition);
		self::$view_data['navlist'] = $pnavlist;
		$this->load->view('admin/nav/add.php',self::$view_data);
	}

	public function doadd()
	{
		$keyword = trim($this->input->post('keyword'));
		$pNavId = intval($this->input->post('pNavId'));
		$sNavName = trim($this->input->post('sNavName'));
		$sNavUrl = trim($this->input->post('sNavUrl'));
		$sort = intval($this->input->post('sort'));
		$addArr = array(
			'pNavId' => $pNavId,
			'sNavName' => $sNavName,
			'sNavUrl' => $sNavUrl,
			'sort' => $sort,
			'keyword' => $keyword
		);
		$sNavId = $this->nav->addData($addArr);
		if(!empty($sNavId))
		{
			redirect('admin/Navigate/index');
		}
		else
		{
			redirect('admin/Navigate/index');
		}
	}

	/**
	 * 编辑
	 * @param $sNavId
	 */
	public function edit($sNavId)
	{
		$sNavId = intval($sNavId);
		$info = $this->nav->getSnavById($sNavId);
		$condition = array();
		$condition['deleteFlag'] = 0;
		$pnavlist = $this->nav->getNavList($condition);
		self::$view_data['navlist'] = $pnavlist;
		self::$view_data['info'] = $info;
		$this->load->view('admin/nav/edit',self::$view_data);
	}

	/**
	 * 执行修改
	 */
	public function doedit()
	{
		$sNavId = intval($this->input->post('sNavId'));
		$updateArr = array();
		$updateArr['keyword'] = trim($this->input->post('keyword'));
		$updateArr['sNavName'] = trim($this->input->post('sNavName'));
		$updateArr['sNavUrl'] = trim($this->input->post('sNavUrl'));
		$updateArr['pNavId'] = intval($this->input->post('pNavId'));
		$updateArr['sort'] = trim($this->input->post('sort'));
		$bool = $this->nav->updateData($updateArr , $sNavId);
		if($bool)
		{
			redirect('admin/Navigate/index');
		}
		else
		{
			redirect('admin/Navigate/index');
		}
	}

	/**
	 * 删除
	 * @param $sNavId
	 * @param $deleteFlag
	 */
	public function delete($sNavId , $deleteFlag)
	{
		$sNavId = intval($sNavId);
		$updateArr = array();
		$updateArr['deleteFlag'] = intval($deleteFlag);
		$bool = $this->nav->updateData($updateArr , $sNavId);
		if($bool)
		{
			redirect('admin/Navigate/index');
		}
		else
		{
			redirect('admin/Navigate/index');
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
