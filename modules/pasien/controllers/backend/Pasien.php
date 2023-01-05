<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Pasien Controller
*| --------------------------------------------------------------------------
*| Pasien site
*|
*/
class Pasien extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_pasien');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Pasiens
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('pasien_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pasiens'] = $this->model_pasien->get($filter, $field, $this->limit_page, $offset);
		$this->data['pasien_counts'] = $this->model_pasien->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/pasien/index/',
			'total_rows'   => $this->data['pasien_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Pasien List');
		$this->render('backend/standart/administrator/pasien/pasien_list', $this->data);
	}
	
	/**
	* Add new pasiens
	*
	*/
	public function add()
	{
		$this->is_allowed('pasien_add');

		$this->template->title('Pasien New');
		$this->render('backend/standart/administrator/pasien/pasien_add', $this->data);
	}

	/**
	* Add New Pasiens
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('pasien_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('noRM', 'NoRM', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('nik', 'Nik', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('jkelamin', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('jenis_asuransi', 'Jenis Asuransi', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('dpjp', 'DPJP', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('ruang', 'Ruang', 'trim|required|max_length[20]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'noRM' => $this->input->post('noRM'),
				'nik' => $this->input->post('nik'),
				'jkelamin' => $this->input->post('jkelamin'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'jenis_asuransi' => $this->input->post('jenis_asuransi'),
				'dpjp' => $this->input->post('dpjp'),
				'ruang' => $this->input->post('ruang'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_pasien = $id = $this->model_pasien->store($save_data);
            

			if ($save_pasien) {
				
				$id = $save_pasien;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_pasien;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/pasien/edit/' . $save_pasien, 'Edit Pasien'),
						anchor('administrator/pasien', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/pasien/edit/' . $save_pasien, 'Edit Pasien')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pasien');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pasien');
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
	* Update view Pasiens
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('pasien_update');

		$this->data['pasien'] = $this->model_pasien->find($id);

		$this->template->title('Pasien Update');
		$this->render('backend/standart/administrator/pasien/pasien_update', $this->data);
	}

	/**
	* Update Pasiens
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('pasien_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('noRM', 'NoRM', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('nik', 'Nik', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('jkelamin', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('jenis_asuransi', 'Jenis Asuransi', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('dpjp', 'DPJP', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('ruang', 'Ruang', 'trim|required|max_length[20]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'noRM' => $this->input->post('noRM'),
				'nik' => $this->input->post('nik'),
				'jkelamin' => $this->input->post('jkelamin'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'jenis_asuransi' => $this->input->post('jenis_asuransi'),
				'dpjp' => $this->input->post('dpjp'),
				'ruang' => $this->input->post('ruang'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_pasien = $this->model_pasien->change($id, $save_data);

			if ($save_pasien) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/pasien', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pasien');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pasien');
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
	* delete Pasiens
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('pasien_delete');

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
            set_message(cclang('has_been_deleted', 'pasien'), 'success');
        } else {
            set_message(cclang('error_delete', 'pasien'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Pasiens
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('pasien_view');

		$this->data['pasien'] = $this->model_pasien->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Pasien Detail');
		$this->render('backend/standart/administrator/pasien/pasien_view', $this->data);
	}
	
	/**
	* delete Pasiens
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$pasien = $this->model_pasien->find($id);

		
		
		return $this->model_pasien->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('pasien_export');

		$this->model_pasien->export(
			'pasien', 
			'pasien',
			$this->model_pasien->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('pasien_export');

		$this->model_pasien->pdf('pasien', 'pasien');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('pasien_export');

		$table = $title = 'pasien';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_pasien->find($id);
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


/* End of file pasien.php */
/* Location: ./application/controllers/administrator/Pasien.php */