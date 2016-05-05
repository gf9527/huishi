<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 服务介绍model
 * Class Service_model
 */
class Service_model extends CI_Model
{
	private $table = 'cm_servicesystem';
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 编辑
	 * @param $data
	 * @param $cId
	 * @return mixed
	 */
	public function updateData($data, $sId)
	{
		$sId = intval($sId);
		if ($sId != 0) {
			$this->db->where('sId', $sId);
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
	public function getInfo($sId = false)
	{
		$sId = intval($sId);
		if(!empty($sId))
		{
			$this->db->where('sId',$sId);
		}
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}
}
