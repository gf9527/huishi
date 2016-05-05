<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 版本下载model
 * Class Edition_model
 */
class Edition_model extends CI_Model
{
	private $table = 'cm_editionadmin';
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
	public function updateData($data, $eId)
	{
		$eId = intval($eId);
		if ($eId != 0) {
			$this->db->where('eId', $eId);
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
	public function getInfo($eId = false)
	{
		$eId = intval($eId);
		if(!empty($eId))
		{
			$this->db->where('eId',$eId);
		}
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}
}
