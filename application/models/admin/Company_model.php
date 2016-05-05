<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 公司介绍model
 * Class Company_model
 */
class Company_model extends CI_Model
{
	private $table = 'cm_companyinfo';
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 编辑公司信息
	 * @param $data
	 * @param $cId
	 * @return mixed
	 */
	public function updateData($data, $cId)
	{
		$cId = intval($cId);
		if ($cId != 0) {
			$this->db->where('cId', $cId);
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
	public function getInfo($cId = false)
	{
		$cId = intval($cId);
		if(!empty($cId))
		{
			$this->db->where('cId',$cId);
		}
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}
}
