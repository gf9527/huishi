<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 新闻中心
 * @author  gf
 * @time 2016/1/20
 * class News
 */
class News extends CI_Controller
{
    private static $view_data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Public_model', 'publicmodel');
        $this->publicmodel->checkUser();
        self::$view_data['header'] = $this->publicmodel->adminheader();
        $this->load->model('admin/News_model', 'news');
    }

    /**
     * 新闻主页
     */
    public function index()
    {
        $condition =array();
        $param = array();
        $limit = 20;
        $start = $this->uri->segment(4);
        $start = isset($start) ? intval($start) : 0;
        $count = $this->news->getCount($condition);
        $parampage = $this->publicmodel->dealparam($param);
        $this->publicmodel->create_page('admin/News/index', $count, $limit ,4);
        $newslist = $this->news->getList($condition , $limit , $start);
        self::$view_data['list'] = $newslist;
        self::$view_data['count'] = $count;
        self::$view_data['parampage'] = $parampage;
        $this->load->view('admin/news/list',self::$view_data);
    }

    /*
     * 发布新闻
     */
    public function add()
    {
        $this->load->view('admin/news/add',self::$view_data);
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
        $addArr['editor'] = trim($this->input->post('editor'));
        $imageName = 'imageName';
        $fileName = $this->publicmodel->uploader($imageName);
        $addArr['imageName'] = $fileName;
        $newsId = $this->news->addData($addArr);
        redirect('admin/News/index');
    }

    /**
     * 编辑新闻
     * @param $newsId
     */
    public function edit($newsId)
    {
        $newsId = intval($newsId);
        $info = $this->news->getInfo($newsId);
        self::$view_data['info'] = $info;
        $this->load->view('admin/news/edit',self::$view_data);
    }

    /**
     * 执行修改
     */
    public function doedit()
    {
        $newsId = intval($this->input->post('newsId'));
        $title = trim($this->input->post('title'));
        $contents = trim($this->input->post('contents'));
        $createTime = time();
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
            );
            $bool = $this->news->updateData($updateArr , $newsId);
            redirect('admin/News/index');
        }
        else
        {
            $updateArr = array(
                'title' => $title,
                'contents' => $contents,
                'createTime' => $createTime,
                'editor' => $editor,
                'imageName' => $imgName,
            );
            $bool = $this->news->updateData($updateArr , $newsId);
            redirect('admin/News/index');
        }
    }

    /**
     * 删除
     * @param $newsId
     * @param $imageName
     */
    public function delete($newsId , $imageName)
    {
        $newsId = intval($newsId);
        $imageName = trim($imageName);
        $filePath = './uploads/'.$imageName;
        if(!empty($imageName))
        {
            unlink($filePath);
            $this->news->deleteData($newsId);
        }
        else
        {
            $this->news->deleteData($newsId);
        }
        redirect('admin/News/index');
    }
}