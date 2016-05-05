<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 前段页面
 * Class Index
 */
class Index extends CI_Controller
{
	private static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model','publicmodel');
		self::$view_data['header'] = $this->publicmodel->header();
		$keyword = $this->uri->segment(2);
		$navlist = $this->publicmodel->keyword($keyword);
		self::$view_data['navName'] = $navlist['navName'];
		$this->load->model('admin/Product_model','product');
		$this->load->model('admin/Productmenu_model','productmenu');
		$this->load->model('admin/Scheme_model','scheme');
		$this->load->model('admin/News_model','news');
		$this->load->model('admin/Service_model','Service');
		$this->load->model('admin/Edition_model','edition');
		$this->load->model('admin/Navigate_model','nav');
		$this->load->model('admin/Company_model','company');
		$this->load->model('admin/Recruit_model','recruit');
	}

	/**
	 * @author  gf
	 * 主页
	 */
	public function index()
	{
		$limit = 6;
		$condition = array();
		$condition['type'] = 0;
		$list = $this->scheme->getList($condition,$limit);
		self::$view_data['list'] = $list;
		$param = array();
		$newslist = $this->news->getList($param , $limit);
		self::$view_data['newslist'] = $newslist;

		$productarr = array();
		$productlist = $this->product->getList($productarr);
		self::$view_data['productlist'] = $productlist;
		$this->load->view('web/index', self::$view_data);
	}

	/**
	 * @author gf
	 * 产品主页
	 */
	public function product()
	{
		$condition = array();
		$limit = 4;
		$mentName = $this->productmenu->getList($condition , $limit);
		if(!empty($mentName)) foreach($mentName as $k=>$v)
		{
			$condition = array();
			$condition['typeId'] = $v['typeId'];
			$mentName[$k]['productlist'] = $this->product->getList($condition);
		}
		$product = $this->product->getList();
		self::$view_data['product'] = $product;
		self::$view_data['menulist'] = $mentName;
		$this->load->view('web/product',self::$view_data);
	}

	/*
	 * 产品详情
	 */
	public function productcontents($productId)
	{
		$mentName = $this->productmenu->getList();
		if(!empty($mentName)) foreach($mentName as $k=>$v)
		{
			$condition = array();
			$condition['typeId'] = $v['typeId'];
			$mentName[$k]['productlist'] = $this->product->getList($condition);
		}
		self::$view_data['menulist'] = $mentName;
		$productId = intval($productId);
		$info = $this->product->getInfo($productId);
		self::$view_data['info'] = $info;
		$this->load->view('web/productcontents',self::$view_data);
	}

	/**
	 * @author  gf
	 * 方案主页
	 */
	public function scheme()
	{
		$condition = array();
		$type = $this->input->get('type');
		$condition['type'] = isset($type) ? intval($type) : 3;
		if($condition['type'] == 3)
		{
			$condition['type'] = false;
		}
		$list = $this->scheme->getList($condition);
		self::$view_data['list'] = $list;
		self::$view_data['type'] = $condition['type'];
		$this->load->view('web/scheme',self::$view_data);
	}

	/**
	 * 方案详情
	 * @param $sId
	 */
	public function schemecontents($sId)
	{
		$sId = intval($sId);
		$info = $this->scheme->getInfo($sId);
		self::$view_data['info'] = $info;
		$this->load->view('web/schemecontents',self::$view_data);
	}
	/**
	 * @author  gf
	 * 展示主页
	 */
	public function news()
	{
		$list = $this->news->getList();
		self::$view_data['list'] = $list;
		$this->load->view('web/news',self::$view_data);
	}

	/*
	 * 新闻内容
	 */
	public function newscontents($newsId)
	{
		$newsId = intval($newsId);
		$info = $this->news->getInfo($newsId);
		$list = $this->news->getList();
		self::$view_data['info'] = $info;
		self::$view_data['list'] = $list;
		$this->load->view('web/newscontents',self::$view_data);
	}

	/**
	 * @author  gf
	 * 服务主页
	 */
	public function service($sId = false)
	{
		$sId = intval($sId);
		if($sId = 0)
		{
			$sId = false;
		}
		$info = $this->Service->getInfo($sId);
		self::$view_data['info'] = $info;
		$this->load->view('web/service',self::$view_data);
	}

	/**
	 * 下载页面
	 */
	public function download()
	{
		$info = $this->edition->getInfo();
		self::$view_data['info'] = $info;
		$this->load->view('web/download',self::$view_data);
	}

	/**
	 * @author  gf
	 * 关于我们
	 */
	public function about()
	{
		$list = $this->nav->getAboutList('cm_aboutnav');
		$cId = false;
		$info = $this->company->getInfo($cId);
		self::$view_data['info'] = $info;
		self::$view_data['list'] = $list;
		self::$view_data['keyword'] = $this->uri->segment(2);
		$this->load->view('web/about',self::$view_data);
	}

	/**
	 * 公司信息
	 */
	public function company()
	{
		$list = $this->nav->getAboutList('cm_aboutnav');
		self::$view_data['list'] = $list;
		self::$view_data['keyword'] = $this->uri->segment(2);
		$cId = false;
		$info = $this->company->getInfo($cId);
		self::$view_data['info'] = $info;
		$this->load->view('web/about/company',self::$view_data);
	}

	/**
	 * 招聘信息
	 */
	public function recruit()
	{
		$list = $this->nav->getAboutList('cm_aboutnav');
		self::$view_data['list'] = $list;
		self::$view_data['keyword'] = $this->uri->segment(2);
		$info = $this->recruit->getLlistById();
		self::$view_data['info'] = $info;
		$this->load->view('web/about/recruit',self::$view_data);
	}

	/**
	 * 联系我们
	 */
	public function contact()
	{
		$list = $this->nav->getAboutList('cm_aboutnav');
		self::$view_data['list'] = $list;
		self::$view_data['keyword'] = $this->uri->segment(2);
		$cId = false;
		$info = $this->company->getInfo($cId);
		self::$view_data['info'] = $info;
		$this->load->view('web/about/contact',self::$view_data);
	}
}
