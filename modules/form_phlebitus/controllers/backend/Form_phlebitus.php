<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Phlebitus Controller
*| --------------------------------------------------------------------------
*| Form Phlebitus site
*|
*/
class Form_phlebitus extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_phlebitus');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Phlebituss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_phlebitus_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_phlebituss'] = $this->model_form_phlebitus->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_phlebitus_counts'] = $this->model_form_phlebitus->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_phlebitus/index/',
			'total_rows'   => $this->data['form_phlebitus_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Phlebitus List');
		$this->render('backend/standart/administrator/form_phlebitus/form_phlebitus_list', $this->data);
	}
	
	/**
	* Add new form_phlebituss
	*
	*/
	public function add()
	{
		$this->is_allowed('form_phlebitus_add');

		$this->template->title('Form Phlebitus New');
		$this->render('backend/standart/administrator/form_phlebitus/form_phlebitus_add', $this->data);
	}

	/**
	* Add New Form Phlebituss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_phlebitus_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('j_pemasangan', 'Jenis Pemasangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('t_pemasangan', 'Tujuan Pemasangan', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[50]');
		

		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required|max_length[20]');
		

		$this->form_validation->set_rules('tanggal_pasang', 'Tanggal Pasang', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('lkts', 'Lakukan Kebersihan Tangan Sebelum Dan Sesudah Pemasangan', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('lpbp', 'Lakukan Pengecekan Balutan Pemasangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('lptp', 'Lakukan Pengecekan Tempat Pemasangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('mpaak', 'Melepas Pemasangan Apabila Ada Keluhan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('mpal', 'Melepas Pemasangan Apabila Lebih Dari 72 Jam', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('tanggal_lepas', 'Tanggal Lepas', 'trim|required|max_length[50]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'no_rm' => $this->input->post('no_rm'),
				'j_pemasangan' => $this->input->post('j_pemasangan'),
				't_pemasangan' => $this->input->post('t_pemasangan'),
				'keterangan' => $this->input->post('keterangan'),
				'lokasi' => $this->input->post('lokasi'),
				'tanggal_pasang' => $this->input->post('tanggal_pasang'),
				'lkts' => $this->input->post('lkts'),
				'lpbp' => $this->input->post('lpbp'),
				'lptp' => $this->input->post('lptp'),
				'mpaak' => $this->input->post('mpaak'),
				'mpal' => $this->input->post('mpal'),
				'tanggal_lepas' => $this->input->post('tanggal_lepas'),
			];

			
			



			
			
			$save_form_phlebitus = $id = $this->model_form_phlebitus->store($save_data);
            

			if ($save_form_phlebitus) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_phlebitus;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_phlebitus/edit/' . $save_form_phlebitus, 'Edit Form Phlebitus'),
						anchor('administrator/form_phlebitus', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_phlebitus/edit/' . $save_form_phlebitus, 'Edit Form Phlebitus')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_phlebitus');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_phlebitus');
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
	* Update view Form Phlebituss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_phlebitus_update');

		$this->data['form_phlebitus'] = $this->model_form_phlebitus->find($id);

		$this->template->title('Form Phlebitus Update');
		$this->render('backend/standart/administrator/form_phlebitus/form_phlebitus_update', $this->data);
	}

	/**
	* Update Form Phlebituss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_phlebitus_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('j_pemasangan', 'Jenis Pemasangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('t_pemasangan', 'Tujuan Pemasangan', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[50]');
		

		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required|max_length[20]');
		

		$this->form_validation->set_rules('tanggal_pasang', 'Tanggal Pasang', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('lkts', 'Lakukan Kebersihan Tangan Sebelum Dan Sesudah Pemasangan', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('lpbp', 'Lakukan Pengecekan Balutan Pemasangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('lptp', 'Lakukan Pengecekan Tempat Pemasangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('mpaak', 'Melepas Pemasangan Apabila Ada Keluhan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('mpal', 'Melepas Pemasangan Apabila Lebih Dari 72 Jam', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('tanggal_lepas', 'Tanggal Lepas', 'trim|required|max_length[50]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'no_rm' => $this->input->post('no_rm'),
				'j_pemasangan' => $this->input->post('j_pemasangan'),
				't_pemasangan' => $this->input->post('t_pemasangan'),
				'keterangan' => $this->input->post('keterangan'),
				'lokasi' => $this->input->post('lokasi'),
				'tanggal_pasang' => $this->input->post('tanggal_pasang'),
				'lkts' => $this->input->post('lkts'),
				'lpbp' => $this->input->post('lpbp'),
				'lptp' => $this->input->post('lptp'),
				'mpaak' => $this->input->post('mpaak'),
				'mpal' => $this->input->post('mpal'),
				'tanggal_lepas' => $this->input->post('tanggal_lepas'),
			];

			

			


			
			
			$save_form_phlebitus = $this->model_form_phlebitus->change($id, $save_data);

			if ($save_form_phlebitus) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_phlebitus', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_phlebitus');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_phlebitus');
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
	* delete Form Phlebituss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_phlebitus_delete');

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
            set_message(cclang('has_been_deleted', 'form_phlebitus'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_phlebitus'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Phlebituss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_phlebitus_view');

		$this->data['form_phlebitus'] = $this->model_form_phlebitus->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Phlebitus Detail');
		$this->render('backend/standart/administrator/form_phlebitus/form_phlebitus_view', $this->data);
	}
	
	/**
	* delete Form Phlebituss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_phlebitus = $this->model_form_phlebitus->find($id);

		
		
		return $this->model_form_phlebitus->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_phlebitus_export');

		$this->model_form_phlebitus->export(
			'form_phlebitus', 
			'form_phlebitus',
			$this->model_form_phlebitus->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_phlebitus_export');

		$this->model_form_phlebitus->pdf('form_phlebitus', 'form_phlebitus');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_phlebitus_export');

		$table = $title = 'form_phlebitus';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_phlebitus->find($id);
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


/* End of file form_phlebitus.php */
/* Location: ./application/controllers/administrator/Form Phlebitus.php */