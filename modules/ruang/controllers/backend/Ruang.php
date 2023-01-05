<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Ruang Controller
*| --------------------------------------------------------------------------
*| Ruang site
*|
*/
class Ruang extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_ruang');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Ruangs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('ruang_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['ruangs'] = $this->model_ruang->get($filter, $field, $this->limit_page, $offset);
		$this->data['ruang_counts'] = $this->model_ruang->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/ruang/index/',
			'total_rows'   => $this->data['ruang_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Ruang List');
		$this->render('backend/standart/administrator/ruang/ruang_list', $this->data);
	}
	
	/**
	* Add new ruangs
	*
	*/
	public function add()
	{
		$this->is_allowed('ruang_add');

		$this->template->title('Ruang New');
		$this->render('backend/standart/administrator/ruang/ruang_add', $this->data);
	}

	/**
	* Add New Ruangs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('ruang_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required|max_length[10]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
			];

			
			



			
			
			$save_ruang = $id = $this->model_ruang->store($save_data);
            

			if ($save_ruang) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_ruang;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/ruang/edit/' . $save_ruang, 'Edit Ruang'),
						anchor('administrator/ruang', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/ruang/edit/' . $save_ruang, 'Edit Ruang')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/ruang');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/ruang');
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
	* Update view Ruangs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('ruang_update');

		$this->data['ruang'] = $this->model_ruang->find($id);

		$this->template->title('Ruang Update');
		$this->render('backend/standart/administrator/ruang/ruang_update', $this->data);
	}

	/**
	* Update Ruangs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('ruang_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required|max_length[10]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
			];

			

			


			
			
			$save_ruang = $this->model_ruang->change($id, $save_data);

			if ($save_ruang) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/ruang', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/ruang');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/ruang');
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
	* delete Ruangs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('ruang_delete');

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
            set_message(cclang('has_been_deleted', 'ruang'), 'success');
        } else {
            set_message(cclang('error_delete', 'ruang'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Ruangs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('ruang_view');

		$this->data['ruang'] = $this->model_ruang->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Ruang Detail');
		$this->render('backend/standart/administrator/ruang/ruang_view', $this->data);
	}
	
	/**
	* delete Ruangs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$ruang = $this->model_ruang->find($id);

		
		
		return $this->model_ruang->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('ruang_export');

		$this->model_ruang->export(
			'ruang', 
			'ruang',
			$this->model_ruang->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('ruang_export');

		$this->model_ruang->pdf('ruang', 'ruang');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('ruang_export');

		$table = $title = 'ruang';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_ruang->find($id);
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


/* End of file ruang.php */
/* Location: ./application/controllers/administrator/Ruang.php */