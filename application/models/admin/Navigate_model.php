<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 导航管理
 * Class Navigate_model
 */
class Navigate_model extends CI_Model
{
	private $table = 'cm_parentnavigation';
	private $tabletwo = 'cm_subnavigation';
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *
	 * 添加数据 针对父级导航
	 * @param $data
	 * @return mixed
	 */
	public function pAddData($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * 导航列表
	 * @author  gf
	 * @param $condition
	 * @return mixed
	 */
	public function getNavList($condition)
	{
		$where = $this->_getWhere($condition);
		$this->db->where($where);
		$this->db->order_by('pNavSort','ASC');
		$query = $this->db->get($this->table)->result_array();
		return $query;
	}

	/**
	 * 选择条件
	 * @author  gf
	 * @param array $condition
	 * @return array
	 */
	private function _getWhere($condition = array())
	{
		$where = array();
		if(isset($condition['deleteFlag']) && $condition['deleteFlag'] !== false)
		{
			$where['deleteFlag'] = $condition['deleteFlag'];
		}

		if(isset($condition['pNavId']))
		{
			$where['pNavId'] = $condition['pNavId'];
		}
		return $where;
	}

	/********************子集导航管理************************************/
	/**
	 * @author  gf
	 * 子集导航列表
	 * @param array $condition
	 * @return mixed
	 */
	public function getSnavList($condition = array())
	{
		$where = $this->_getWhere($condition);
		$this->db->where($where);
		$this->db->order_by('sort','ASC');
		$query = $this->db->get($this->tabletwo)->result_array();
		return $query;
	}

	/**获取单条
	 * @param array $condition
	 * @return mixed
	 */
	public function getSnavById($sNavId)
	{
		$this->db->where('sNavId',$sNavId);
		$query = $this->db->get($this->tabletwo)->row_array();
		return $query;
	}

	/**
	 *
	 * 添加数据 针对子集导航
	 * @param $data
	 * @return mixed
	 */
	public function addData($data)
	{
		$this->db->insert($this->tabletwo, $data);
		return $this->db->insert_id();
	}

	/**
	 * @param $data
	 * @param $sNavId
	 * @return mixed
	 */
	public function updateData($data , $sNavId)
	{
		$this->db->where('sNavId',$sNavId);
		return $this->db->update($this->tabletwo , $data);
	}

	/*************about 子导航**************/
	public function getAboutList($table)
	{
		$query = $this->db->get($table)->result_array();
		return $query;
	}
}
