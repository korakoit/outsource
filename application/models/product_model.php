<?php if ( ! defined('BASEPATH'))  exit('No direct script access allowed');

class Product_model extends CI_Model {

	private $code_length = 6;

	public function __construct(){
		parent::__construct();
	}
}