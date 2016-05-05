<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 产品管理
 * @author  gf
 * @time 2016/1/20
 * class News
 */
class Product extends CI_Controller
{
	private static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model', 'publicmodel');
		$this->publicmodel->checkUser();
		self::$view_data['header'] = $this->publicmodel->adminheader();
		$this->load->model('admin/Product_model', 'product');
		$this->load->model('admin/Productmenu_model', 'Productmenu');
	}

	/**
	 * 产品主页
	 */
	public function index()
	{
		$condition =array();
		$param = array();
		$limit = 16;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$count = $this->product->getCount($condition);
		$parampage = $this->publicmodel->dealparam($param);
		$this->publicmodel->create_page('admin/Product/index', $count, $limit ,4);
		$productlist = $this->product->getList($condition , $limit , $start);
		if(!empty($productlist)) foreach($productlist as $k=>$v)
		{
			$productlist[$k]['typeinfo'] = $this->Productmenu->getInfo($v['typeId']);
		}
		self::$view_data['list'] = $productlist;
		self::$view_data['count'] = $count;
		self::$view_data['parampage'] = $parampage;
		$this->load->view('admin/product/list',self::$view_data);
	}

	/*
	 * 发布
	 */
	public function add()
	{
		$typelist = $this->Productmenu->getListAll();
		self::$view_data['typelist'] = $typelist;
		$this->load->view('admin/product/add',self::$view_data);
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
		$addArr['typeId'] = intval($this->input->post('typeId'));
		$addArr['param'] = $this->input->post('param');
		$addArr['productOffice'] = $this->input->post('productOffice');
		$imageName = 'imageName';
		$fileName = $this->publicmodel->uploader($imageName);
		$addArr['imageName'] = $fileName;
		$newsId = $this->product->addData($addArr);
		redirect('admin/Product/index');
	}

	/**
	 * 编辑
	 * @param $productId
	 */
	public function edit($productId)
	{
		$productId = intval($productId);
		$info = $this->product->getInfo($productId);
		$typelist = $this->Productmenu->getListAll();
		self::$view_data['typelist'] = $typelist;
		self::$view_data['info'] = $info;
		$this->load->view('admin/product/edit',self::$view_data);
	}

	/**
	 * 执行修改
	 */
	public function doedit()
	{
		$productId = intval($this->input->post('productId'));
		$title = trim($this->input->post('title'));
		$contents = trim($this->input->post('contents'));
		$createTime = time();
		$typeId = intval($this->input->post('typeId'));
		$param = $this->input->post('param');
		$productOffice = $this->input->post('productOffice');
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
				'imageName' => $fileName,
				'typeId' => $typeId,
				'param' => $param,
				'productOffice' => $productOffice
			);
			$bool = $this->product->updateData($updateArr , $productId);
		}
		else
		{
			$updateArr = array(
				'title' => $title,
				'contents' => $contents,
				'createTime' => $createTime,
				'imageName' => $imgName,
				'typeId' => $typeId,
				'param' => $param,
				'productOffice' => $productOffice
			);
			$bool = $this->product->updateData($updateArr , $productId);
		}
		redirect('admin/Product/index');

	}

	/**
	 * 删除
	 * @param $sId
	 * @param $imageName
	 */
	public function delete($productId , $imageName)
	{
		$productId = intval($productId);
		$imageName = trim($imageName);
		$filePath = './uploads/'.$imageName;
		if(!empty($imageName))
		{
			unlink($filePath);
			$this->product->deleteData($productId);
		}
		else
		{
			$this->product->deleteData($productId);
		}
		redirect('admin/Product/index');
	}
}