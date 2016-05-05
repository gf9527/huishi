<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 官网导航model
 * Class Webnav_model
 */
class Webnav_model extends CI_Model
{
	private $table = 'cm_webnav';
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
	public function updateData($data , $wId)
	{
		$wId = intval($wId);
		$this->db->where('wId', $wId);
		$query = $this->db->update($this->table, $data);
		return $query;
	}

	/**
	 * 导航列表
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
	public function getInfo($wId)
	{
		$this->db->where('wId' , $wId);
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}

	/**删除
	 * @param $productId
	 * @return mixed
	 */
	public function deleteData($wId)
	{
		$wId = intval($wId);
		$this->db->where('wId',$wId);
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
		if(isset($condition['wId']))
		{
			$where['wId'] = $condition['wId'];
		}
		if(isset($condition['deleteFlag']))
		{
			$where['deleteFlag'] = $condition['deleteFlag'];
		}
		if(isset($condition['navType']))
		{
			$where['navType'] = $condition['navType'];
		}
		return $where;
	}
}
