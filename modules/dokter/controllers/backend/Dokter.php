<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dokter Controller
*| --------------------------------------------------------------------------
*| Dokter site
*|
*/
class Dokter extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_dokter');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Dokters
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('dokter_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['dokters'] = $this->model_dokter->get($filter, $field, $this->limit_page, $offset);
		$this->data['dokter_counts'] = $this->model_dokter->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/dokter/index/',
			'total_rows'   => $this->data['dokter_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Dokter List');
		$this->render('backend/standart/administrator/dokter/dokter_list', $this->data);
	}
	
	/**
	* Add new dokters
	*
	*/
	public function add()
	{
		$this->is_allowed('dokter_add');

		$this->template->title('Dokter New');
		$this->render('backend/standart/administrator/dokter/dokter_add', $this->data);
	}

	/**
	* Add New Dokters
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('dokter_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required|max_length[50]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'iddokter' => $this->input->post('iddokter'),
				'nama' => $this->input->post('nama'),
				'spesialis' => $this->input->post('spesialis'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_dokter = $id = $this->model_dokter->store($save_data);
            

			if ($save_dokter) {
				
				$id = $save_dokter;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_dokter;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/dokter/edit/' . $save_dokter, 'Edit Dokter'),
						anchor('administrator/dokter', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/dokter/edit/' . $save_dokter, 'Edit Dokter')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dokter');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dokter');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Dokters
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('dokter_update');

		$this->data['dokter'] = $this->model_dokter->find($id);

		$this->template->title('Dokter Update');
		$this->render('backend/standart/administrator/dokter/dokter_update', $this->data);
	}

	/**
	* Update Dokters
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('dokter_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required|max_length[50]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'iddokter' => $this->input->post('iddokter'),
				'nama' => $this->input->post('nama'),
				'spesialis' => $this->input->post('spesialis'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_dokter = $this->model_dokter->change($id, $save_data);

			if ($save_dokter) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/dokter', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dokter');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dokter');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Dokters
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('dokter_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'dokter'), 'success');
        } else {
            set_message(cclang('error_delete', 'dokter'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Dokters
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('dokter_view');

		$this->data['dokter'] = $this->model_dokter->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Dokter Detail');
		$this->render('backend/standart/administrator/dokter/dokter_view', $this->data);
	}
	
	/**
	* delete Dokters
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$dokter = $this->model_dokter->find($id);

		
		
		return $this->model_dokter->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('dokter_export');

		$this->model_dokter->export(
			'dokter', 
			'dokter',
			$this->model_dokter->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('dokter_export');

		$this->model_dokter->pdf('dokter', 'dokter');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('dokter_export');

		$table = $title = 'dokter';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_dokter->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file dokter.php */
/* Location: ./application/controllers/administrator/Dokter.php */