<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 网站信息model
 * Class Webinfo_model
 */
class Webinfo_model extends CI_Model
{
	private $table = 'cm_webinfo';

	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * 编辑网站信息
	 * @author  gf
	 * @param $data
	 * @return mixed
	 */
	public function updateData($data, $wId)
	{
		$wId = intval($wId);
		if ($wId != 0) {
			$this->db->where('wId', $wId);
			return $this->db->update($this->table, $data);
		} else {
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
	}

	/**
	 *
	 * @param $wId
	 * @return mixed
	 */
	public function getwebInfo($wId = false)
	{
		$wId = intval($wId);
		if(!empty($wId))
		{
			$this->db->where('wId',$wId);
		 }
		$query = $this->db->get($this->table)->row_array();
		return $query;
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
	 * 获得单条消息
	 * @return mixed
	 */
	public function getInfo()
	{
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}

}
