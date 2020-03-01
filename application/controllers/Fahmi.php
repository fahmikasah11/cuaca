<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fahmi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
	$api = new RestClient([
	'base_url' => "https://ibnux.github.io/BMKG-importer",
	'format' => "json"
	]);
		$result = $api->get("cuaca/501320");
		$data = [];

		$data['data'] = $result->decode_response();
		$data['nama'] = "Fahmi Kasah";
		$this->load->view('fahmi',$data);
	}
}
