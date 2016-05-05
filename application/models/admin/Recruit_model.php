<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 招聘信息model
 * Class Recruit_model
 */
class Recruit_model extends CI_Model
{
	private $table = 'cm_recruitinfo';
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 添加数据
	 * @param $data
	 * @return mixed
	 */
	public function addData($data)
	{
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	/**
	 * 获取全部数据
	 * @param array $condition
	 * @param int $limit
	 * @param int $start
	 * @return mixed
	 */
	public function getList($condition = array() , $limit = 10 , $start = 0)
	{
		$limit = intval($limit);
		$start = intval($start);
		$where = $this->_getwhere($condition);
		$this->db->where($where);
		$this->db->order_by('createTime','DESC');
		$this->db->limit($limit , $start);
		$query = $this->db->get($this->table)->result_array();
		return $query;
	}

	/**
	 * 获取单条
	 * @param $rId
	 * @return mixed
	 */
	public function getLlistById($rId = false)
	{
		if(!empty($rId))
		{
			$this->db->where('rId',$rId);
		}
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}

	/**
	 * 获取总数
	 * @author  gf
	 * @param array $condition
	 * @return mixed
	 */
	public function getCount($condition = array())
	{
		$where = $this->_getwhere($condition);
		$this->db->where($where);
		$count = $this->db->get($this->table)->num_rows();
		return $count;
	}

	/**
	 * 修改数据
	 * @param $data
	 * @param $rId
	 * @return mixed
	 */
	public function updateData($data , $rId)
	{
		$this->db->where('rId',$rId);
		$bool = $this->db->update($this->table , $data);
		return $bool;
	}

	/**
	 * 删除数据
	 * @param $rId
	 * @return mixed
	 */
	public function deleteData($rId)
	{
		$rId = intval($rId);
		$this->db->where('rId',$rId);
		return $this->db->delete($this->table);
	}

	/**
	 * where条件存放处
	 * @param array $condition
	 * @return array
	 */
	private function _getwhere($condition = array())
	{
		$where = array();
		return $where;
	}
}
