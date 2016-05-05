<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* @author  gf
 * 招聘信息控制
 * Class Recruit
 * OK 待优化
 */
class Recruit extends CI_Controller
{
	private static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Recruit_model','recruit');
	}

	/**
	 * 招聘列表
	 */
	public function index()
	{
		$condition =array();
		$param = array();
		$limit = 20;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$count = $this->recruit->getCount($condition);
		$parampage = $this->publicmodel->dealparam($param);
		$this->publicmodel->create_page('admin/Recruit/index', $count, $limit ,4);
		$recruitlist = $this->recruit->getList($condition , $limit , $start);
		self::$view_data['list'] = $recruitlist;
		self::$view_data['count'] = $count;
		self::$view_data['parampage'] = $parampage;
		$this->load->view('admin/recruit/list',self::$view_data);
	}

	/**
	 *发布招聘
	 */
	public function add()
	{
		$this->load->view('admin/recruit/add',self::$view_data);
	}

	/**
	 * 添加招聘入库
	 */
	public function doadd()
	{
		$addData['title'] = trim($this->input->post('title'));
		$addData['wages'] = trim($this->input->post('wages'));
		$addData['education'] = trim($this->input->post('education'));
		$addData['experience'] = trim($this->input->post('experience'));
		$addData['contents'] = trim($this->input->post('contents'));
		$addData['createTime'] = time();
		$rId = $this->recruit->addData($addData);
		if($rId)
		{
			redirect('admin/Recruit/');
		}
		else
		{
			redirect('admin/Recruit/add');
		}
	}

	/**
	 * 编辑招聘信息
	 * @param $rId
	 */
	public function edit($rId)
	{
		$rId = intval($rId);
		$info = $this->recruit->getLlistById($rId);
		self::$view_data['info'] = $info;
		$this->load->view('admin/recruit/edit',self::$view_data);
	}

	/**
	 * 执行修改
	 */
	public function doedit()
	{
		$rId = intval($this->input->post('rId'));
		$addData['title'] = trim($this->input->post('title'));
		$addData['wages'] = trim($this->input->post('wages'));
		$addData['education'] = trim($this->input->post('education'));
		$addData['experience'] = trim($this->input->post('experience'));
		$addData['contents'] = trim($this->input->post('contents'));
		$addData['createTime'] = time();
		$rId = $this->recruit->updateData($addData , $rId);
		if($rId)
		{
			redirect('admin/Recruit/');
		}
		else
		{
			redirect('admin/Recruit/');
		}
	}

	/**
	 * 删除
	 * @param $rId
	 */
	public function delete($rId)
	{
		$rId = intval($rId);
		$bool = $this->recruit->deleteData($rId);
		redirect('admin/Recruit/');
	}

}
