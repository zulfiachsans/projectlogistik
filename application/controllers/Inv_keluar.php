<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *	Inventory Controller
 *
 *	@author Noerman Agustiyan
 * 				noerman.agustiyan@gmail.com
 *					@anoerman
 *
 *	@link 	https://github.com/anoerman
 *		 			https://gitlab.com/anoerman
 *
 *	Accessible for admin and member user group
 *
 */
class Inv_keluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// set error delimeters
		$this->form_validation->set_error_delimiters(
			$this->config->item('error_start_delimiter', 'ion_auth'),
			$this->config->item('error_end_delimiter', 'ion_auth')
		);

		// model
		$this->load->model(
			array(
				'profile_model',
				'inv_keluar_model',
				'categories_model',
				'locations_model',
				'status_model',
				'color_model',
				'logs_model',
			)
		);

		// default datas
		// used in every pages
		if ($this->ion_auth->logged_in()) {
			// user detail
			$loggedinuser = $this->ion_auth->user()->row();
			$this->data['user_full_name'] = $loggedinuser->first_name . " " . $loggedinuser->last_name;
			$this->data['user_photo']     = $this->profile_model->get_user_photo($loggedinuser->username)->row();
		}
	}

	/**
	 *	All inventory data.
	 *	Showing all inventory data without any filtering.
	 * But still using pagination.
	 *
	 *	@param 		string 		$page
	 *	@return 	void
	 *
	 */
	public function all($page = "")
	{
		// Not logged in, redirect to home
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Logged in
		else {
			$this->data['data_list']  = $this->inv_keluar_model->get_inventory();

			// Set pagination
			$config['base_url']         = base_url('inv_keluar/all');
			$config['use_page_numbers'] = TRUE;
			$config['total_rows']       = count($this->data['data_list']->result());
			$config['per_page']         = 15;
			$this->pagination->initialize($config);

			// Get datas and limit based on pagination settings
			if ($page == "") {
				$page = 1;
			}
			$this->data['data_list'] = $this->inv_keluar_model->get_inventory(
				"",
				$config['per_page'],
				($page - 1) * $config['per_page']
			);
			// $this->data['last_query'] = $this->db->last_query();
			$this->data['pagination'] = $this->pagination->create_links();

			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() :
				$this->session->flashdata('message');
			$this->data['stat_list']  = $this->status_model->get_status('', '', '', 'asc');
			//ABCDE

			$this->load->view('partials/_alte_header', $this->data);
			$this->load->view('partials/_alte_menu');
			$this->load->view('inv_keluar/all_data');
			$this->load->view('partials/_alte_footer');
			$this->load->view('inv_keluar/js');
			// $this->load->view('js_script');
		}
	}
	// All inventory data end

	/**
	 *	Inventory by category.
	 *	Showing inventory category name and total inventory per category.
	 * Give link to each categorized inventory.
	 * If code is provided, show data based on code.
	 *
	 *	@param 		string 		$code
	 *	@return 	void
	 *
	 */
	public function by_category($code = "", $page = "")
	{
		// Not logged in, redirect to home
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Logged in
		else {
			// If code is provided, show data based on code
			if ($code != "") {
				// Get category detail
				$category_detail = $this->categories_model->get_categories_by_code($code);
				// If exists, set detailed data. Else redirect back because invalid code
				if (count($category_detail->result()) > 0) {
					foreach ($category_detail->result() as $cat_data) {
						$this->data['category_name'] = $cat_data->name;
						$this->data['category_desc'] = $cat_data->description;
					}
				} else {
					redirect('inv_keluar/by_category', 'refresh');
				}

				// Show all data based on code
				$this->data['data_list']  = $this->inv_keluar_model->get_inventory_by_category_code(
					$code
				);

				// Set pagination
				$config['base_url']         = base_url('inv_keluar/by_category/' . $code);
				$config['use_page_numbers'] = TRUE;
				$config['total_rows']       = count($this->data['data_list']->result());
				$config['per_page']         = 15;
				$this->pagination->initialize($config);

				// Get datas and limit based on pagination settings
				if ($page == "") {
					$page = 1;
				}
				$this->data['data_list'] = $this->inv_keluar_model->get_inventory_by_category_code(
					$code,
					$config['per_page'],
					($page - 1) * $config['per_page']
				);
				// $this->data['last_query'] = $this->db->last_query();
				$this->data['pagination'] = $this->pagination->create_links();

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors()
					: $this->session->flashdata('message');

				$this->load->view('partials/_alte_header', $this->data);
				$this->load->view('partials/_alte_menu');
				$this->load->view('inv_keluar/by_category_data');
				$this->load->view('partials/_alte_footer');
				$this->load->view('inv_keluar/js');
				// $this->load->view('js_script');
			}
			// Summary
			else {
				// inventory by category summary
				$this->data['summary'] = $this->inv_keluar_model->get_inventory_by_category_summary();

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors()
					: $this->session->flashdata('message');

				$this->load->view('partials/_alte_header', $this->data);
				$this->load->view('partials/_alte_menu');
				$this->load->view('inv_keluar/by_category_index');
				$this->load->view('partials/_alte_footer');
				$this->load->view('inv_data/js');
				$this->load->view('js_script');
			}
		}
	}
	// Inventory by category end

	/**
	 *	Inventory by location.
	 *	Showing inventory location name and total inventory per location.
	 * If code is provided, show data based on code.
	 *
	 *	@param 		string 		$code
	 *	@return 	void
	 *
	 */
	public function by_location($code = "", $page = "")
	{
		// Not logged in, redirect to home
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Logged in
		else {
			// If code is provided, show data based on code
			if ($code != "") {
				// Get location detail
				$location_detail = $this->locations_model->get_locations_by_code($code);
				// If exists, set detailed data. Else redirect back because invalid code
				if (count($location_detail->result()) > 0) {
					foreach ($location_detail->result() as $loc_data) {
						$this->data['location_name'] = $loc_data->name;
						$this->data['location_desc'] = $loc_data->detail;
					}
				} else {
					redirect('inv_keluar/by_location', 'refresh');
				}

				// Show all data based on code
				$this->data['data_list']  = $this->inv_keluar_model->get_inventory_by_location_code(
					$code
				);

				// Set pagination
				$config['base_url']         = base_url('inv_keluar/by_location/' . $code);
				$config['use_page_numbers'] = TRUE;
				$config['total_rows']       = count($this->data['data_list']->result());
				$config['per_page']         = 15;
				$this->pagination->initialize($config);

				// Get datas and limit based on pagination settings
				if ($page == "") {
					$page = 1;
				}
				$this->data['data_list'] = $this->inv_keluar_model->get_inventory_by_location_code(
					$code,
					$config['per_page'],
					($page - 1) * $config['per_page']
				);
				// $this->data['last_query'] = $this->db->last_query();
				$this->data['pagination'] = $this->pagination->create_links();

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors()
					: $this->session->flashdata('message');

				$this->load->view('partials/_alte_header', $this->data);
				$this->load->view('partials/_alte_menu');
				$this->load->view('inv_keluar/by_location_data');
				$this->load->view('partials/_alte_footer');
				$this->load->view('inv_keluar/js');
				// $this->load->view('js_script');
			}
			// Summary
			else {
				// inventory by location summary
				$this->data['summary'] = $this->inv_keluar_model->get_inventory_by_location_summary();

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors()
					: $this->session->flashdata('message');

				$this->load->view('partials/_alte_header', $this->data);
				$this->load->view('partials/_alte_menu');
				$this->load->view('inv_keluar/by_location_index');
				$this->load->view('partials/_alte_footer');
				$this->load->view('inv_keluar/js');
				$this->load->view('js_script');
			}
		}
	}
	// Inventory by location end

	/**
	 *	Inventory detail.
	 *	Showing inventory detailed data
	 * If code is provided, show data based on code.
	 *
	 *	@param 		string 		$code
	 *	@return 	void
	 *
	 */
	public function detail($code)
	{
		// Not logged in, redirect to home
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Logged in
		else {
			// If code is provided, show data based on code
			if ($code != "") {
				// Show detailed data based on code
				$this->data['data_detail'] = $this->inv_keluar_model->get_inventory_by_code(
					$code
				);

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors()
					: $this->session->flashdata('message');

				$this->load->view('partials/_alte_header', $this->data);
				$this->load->view('partials/_alte_menu');
				$this->load->view('inv_keluar/detail');
				$this->load->view('partials/_alte_footer');
				$this->load->view('inv_data/js');
				// $this->load->view('js_script');
			}
		}
	}
	// Inventory by category end

	/**
	 *	Search
	 *	Showing inventory search form.
	 *
	 * @param 		string
	 *	@return 	void
	 *
	 */
	public function search($process = "")
	{
		// Not logged in, redirect to home
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Logged in
		else {
			$this->data['cat_list']   = $this->categories_model->get_categories('', '', '', 'asc');
			$this->data['stat_list']  = $this->status_model->get_status('', '', '', 'asc');
			$this->data['loc_list']   = $this->locations_model->get_locations('', '', '', 'asc');
			$this->data['col_list']   = $this->color_model->get_color('', '', '', 'asc');

			// input validation rules
			$this->form_validation->set_rules(
				'keyword',
				'Keyword',
				'alpha_numeric_spaces|trim|required|min_length[3]'
			);

			// check if there's valid input
			if (isset($_POST) && !empty($_POST)) {
				// validation run
				if ($this->form_validation->run() === TRUE) {
					// set variables for keyword and filters
					$keyword  = $this->input->post('keyword');
					$category = (!empty($this->input->post('category'))) ?
						implode($this->input->post('category'), ",") : "";
					$location = (!empty($this->input->post('location'))) ?
						implode($this->input->post('location'), ",") : "";
					$status   = (!empty($this->input->post('status'))) ?
						implode($this->input->post('status'), ",") : "";
					$filters  = array(
						'category_id' => $category,
						'location_id' => $location,
						'status'      => $status
					);
					$this->data['results'] = $this->inv_keluar_model->get_inventory_by_keyword(
						$keyword,
						$filters
					);

					$this->session->set_flashdata(
						'message',
						$this->config->item('success_start_delimiter', 'ion_auth')
							. "Search results with keyword '$keyword'" .
							$this->config->item('success_end_delimiter', 'ion_auth')
					);
				}
			}
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() :
				$this->session->flashdata('message');

			$this->load->view('partials/_alte_header', $this->data);
			$this->load->view('partials/_alte_menu');
			$this->load->view('inv_keluar/search_form');
			$this->load->view('partials/_alte_footer');
			$this->load->view('inv_keluar/js');
			$this->load->view('js_script');
		}
	}
	// Index end

	/**
	 *	Edit Data
	 *	If there's data sent, update
	 *	Else, show the form
	 *
	 *	@param 		string 		$code
	 *	@return 	void
	 *
	 */
	public function edit($code)
	{
		// Not logged in, redirect to home
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Logged in
		else {
			// input validation rules
			// $this->form_validation->set_rules('code', 'Code', 'alpha_numeric|trim|required|callback__code_check');
			$this->form_validation->set_rules('brand', 'Brand', 'trim|required|addslashes');
			$this->form_validation->set_rules('model', 'Model', 'trim|addslashes');
			$this->form_validation->set_rules('serial_number', 'Serial Number', 'trim|addslashes');
			$this->form_validation->set_rules('color', 'Color', 'trim|addslashes');
			$this->form_validation->set_rules('new_color', 'New Color', 'alpha_numeric_spaces|trim|addslashes');
			$this->form_validation->set_rules('jumlah_datas', 'jumlah_datas', 'numeric|trim');
			$this->form_validation->set_rules('length', 'Length', 'numeric|trim');
			$this->form_validation->set_rules('width', 'Width', 'numeric|trim');
			$this->form_validation->set_rules('height', 'Height', 'numeric|trim');
			$this->form_validation->set_rules('weight', 'Weight', 'numeric|trim');
			$this->form_validation->set_rules('price', 'Price', 'numeric|trim');
			$this->form_validation->set_rules('date_of_purchase', 'Date of Purchase', 'trim');
			$this->form_validation->set_rules('descriptions', 'Descriptions', 'trim|addslashes');

			// check if there's valid input
			if (isset($_POST) && !empty($_POST)) {
				// color
				// if new color is not empty, set color - insert to master table
				$new_color = 0;
				$color     = $this->input->post('color');
				if ($this->input->post('new_color') != "") {
					$new_color = 1;
					$color     = ucwords(strtolower($this->input->post('new_color')));
				}

				// color array
				// insert only if color is not duplicate
				if ($new_color == 1 && $this->_color_check($color)) {
					$data_new_color = array('name' => $color,);
					$this->color_model->insert_color($data_new_color);
				}

				// validation run
				if ($this->form_validation->run() === TRUE) {
					// inv data array
					$data = array(
						'category_id'      => $this->input->post('category2'),
						'location_id'      => $this->input->post('location'),
						'brand'            => $this->input->post('brand'),
						'model'            => $this->input->post('model'),
						'serial_number'    => $this->input->post('serial_number'),
						'status'           => $this->input->post('status2'),
						'color'            => $color,
						'jumlah_datas'     => $this->input->post('jumlah_datas'),
						'length'           => $this->input->post('length'),
						'width'            => $this->input->post('width'),
						'height'           => $this->input->post('height'),
						'weight'           => $this->input->post('weight'),
						'price'            => $this->input->post('price'),
						'date_of_purchase' => $this->input->post('date_of_purchase'),
						'description'      => $this->input->post('description')
					);

					// check to see if we are updating the data
					if ($this->inv_keluar_model->update_inventory_by_code($code, $data)) {
						// Set message
						$this->session->set_flashdata(
							'message',
							$this->config->item('message_start_delimiter', 'ion_auth')
								. "Inventory Keluar Updated!" .
								$this->config->item('message_end_delimiter', 'ion_auth')
						);
					} else {
						$this->session->set_flashdata(
							'message',
							$this->config->item('error_start_delimiter', 'ion_auth')
								. "Inventory Keluar Update Failed!" .
								$this->config->item('error_end_delimiter', 'ion_auth')
						);
					}
					redirect('inv_keluar/all', 'refresh');
				}
			}
			// Get data
			$this->data['code']       = $code;
			$this->data['data_list']  = $this->inv_keluar_model->get_inventory_by_code($code);
			$this->data['cat_list']   = $this->categories_model->get_categories('', '', '', 'asc');
			$this->data['stat_list']  = $this->status_model->get_status('', '', '', 'asc');
			$this->data['loc_list']   = $this->locations_model->get_locations('', '', '', 'asc');
			$this->data['col_list']   = $this->color_model->get_color('', '', '', 'asc');
			$this->data['brand_list'] = $this->inv_keluar_model->get_brands();

			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() :
				$this->session->flashdata('message');

			$this->load->view('partials/_alte_header', $this->data);
			$this->load->view('partials/_alte_menu');
			$this->load->view('inv_keluar/edit');
			$this->load->view('partials/_alte_footer');
			$this->load->view('inv_keluar/js');
			$this->load->view('js_script');
		}
	}
	// Edit data end

	/**
	 *	Delete Data
	 *	If there's data sent, update deleted
	 *	Else, redirect to categories
	 *
	 *	@param 		string 		$id
	 *	@return 	void
	 *
	 */
	public function delete($code)
	{
		// Jika tidak login, kembalikan ke halaman utama
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Jika login
		else {
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() :
				$this->session->flashdata('message');

			// check if there's valid input
			if (isset($_POST) && !empty($_POST)) {

				// input validation rules
				$this->form_validation->set_rules('id', 'ID', 'trim|numeric|required');

				// validation run
				if ($this->form_validation->run() === TRUE) {
					$data = array(
						'deleted' => '1',
					);

					// check to see if we are updating the data
					if ($this->inv_keluar_model->update_inventory_by_code($code, $data)) {
						$this->session->set_flashdata(
							'message',
							$this->config->item('message_start_delimiter', 'ion_auth')
								. "Inventory Keluar Deleted!" .
								$this->config->item('message_end_delimiter', 'ion_auth')
						);
					} else {
						$this->session->set_flashdata(
							'message',
							$this->config->item('error_start_delimiter', 'ion_auth')
								. "Inventory Keluar Delete Failed!" .
								$this->config->item('error_end_delimiter', 'ion_auth')
						);
					}
				}
			}
			// Always redirect no matter what!
			redirect('inv_keluar/all', 'refresh');
		}
	}
	// Delete data end
	/**
	 *	Add Data
	 *	If there's data sent, update deleted
	 *	Else, redirect to categories
	 *
	 *	@param 		string 		$id
	 *	@return 	void
	 *
	 */
	public function add($code,$jumlah_datas)
	{
		// Jika tidak login, kembalikan ke halaman utama
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login/inventory', 'refresh');
		}
		// Jika login
		else {
			if ($code==""){
				$this->session->set_flashdata(
						'message',
						$this->config->item('error_start_delimiter', 'ion_auth')
							. "Something Wrong !" .
							$this->config->item('error_end_delimiter', 'ion_auth')
					);
				redirect('welcome','refresh');
			}
			if($this->inv_keluar_model->insert_data($code,$jumlah_datas)){
				$this->session->set_flashdata(
						'message',
						$this->config->item('success_start_delimiter', 'ion_auth')
							. "Inventory Moved !" .
							$this->config->item('success_end_delimiter', 'ion_auth')
					);
				// Always redirect no matter what!
				redirect('inv_keluar/all', 'refresh');
			} else {
				$this->session->set_flashdata(
						'message',
						$this->config->item('error_start_delimiter', 'ion_auth')
							. "Inventory Not Moved !" .
							$this->config->item('error_end_delimiter', 'ion_auth')
					);
				// Always redirect no matter what!
				redirect('inventory/all', 'refresh');
			}
		}
	}
	// add data end

	
}

/* End of Inventory.php */
