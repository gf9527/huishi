<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 方案model
 * Class Scheme_model
 */
class Scheme_model extends CI_Model
{
	private $table = 'cm_scheme';
	public function __construct()
	{
		parent::__construct();
	}

	/**添加数据
	 * @author  gf
	 * @param $data
	 * @return mixed
	 */
	public function addData($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * 修改数据
	 * @author  gf
	 * @param $sId
	 * @param $data
	 * @return mixed
	 */
	public function updateData($data , $sId)
	{
		$sId = intval($sId);
		$this->db->where('sId', $sId);
		$query = $this->db->update($this->table, $data);
		return $query;
	}

	/**
	 * 方案列表
	 * @param array $condition
	 * @param int $limit
	 * @param int $start
	 * @return mixed
	 */
	public function getList($condition = array() , $limit = 10 , $start = 0)
	{
		$start = intval($start);
		$limit = intval($limit);
		$where = $this->_getwhere($condition);
		$this->db->where($where);
		$this->db->limit($limit , $start);
		$this->db->order_by('createTime','DESC');
		$query = $this->db->get($this->table)->result_array();
		return $query;
	}

	/**
	 * 获取总数
	 * @param array $condition
	 * @return mixed
	 */
	public function getCount($condition = array())
	{
		$where = $this->_getwhere($condition);
		$this->db->where($where);
		$query = $this->db->get($this->table)->num_rows();
		return $query;
	}
	/**
	 * 获取单条数据
	 * @author  gf
	 * @param array $condition
	 * @return mixed
	 */
	public function getInfo($sId)
	{
		$this->db->where('sId' , $sId);
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}

	/**删除方案
	 * @param $sId
	 * @return mixed
	 */
	public function deleteData($sId)
	{
		$sId = intval($sId);
		$this->db->where('sId',$sId);
		return $this->db->delete($this->table);
	}

	/**
	 * where条件存放地
	 * @author  gf
	 * @param array $condition
	 * @return array
	 */
	private function _getwhere($condition = array())
	{
		$where = array();
		if(isset($condition['sId']))
		{
			$where['sId'] = $condition['sId'];
		}

		if(isset($condition['type']) && $condition['type'] !== false)
		{
			$where['type'] = $condition['type'];
		}
		return $where;
	}
}
