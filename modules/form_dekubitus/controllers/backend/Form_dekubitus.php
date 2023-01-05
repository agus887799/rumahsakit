<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Dekubitus Controller
*| --------------------------------------------------------------------------
*| Form Dekubitus site
*|
*/
class Form_dekubitus extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_dekubitus');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Dekubituss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_dekubitus_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_dekubituss'] = $this->model_form_dekubitus->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_dekubitus_counts'] = $this->model_form_dekubitus->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_dekubitus/index/',
			'total_rows'   => $this->data['form_dekubitus_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Dekubitus List');
		$this->render('backend/standart/administrator/form_dekubitus/form_dekubitus_list', $this->data);
	}
	
	/**
	* Add new form_dekubituss
	*
	*/
	public function add()
	{
		$this->is_allowed('form_dekubitus_add');

		$this->template->title('Form Dekubitus New');
		$this->render('backend/standart/administrator/form_dekubitus/form_dekubitus_add', $this->data);
	}

	/**
	* Add New Form Dekubituss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_dekubitus_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('Tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('Tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('Jam', 'Jam', 'trim|required|max_length[10]');
		

		$this->form_validation->set_rules('Jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('kondisi_fisik', 'Kondisi Fisik', 'trim|required');
		

		$this->form_validation->set_rules('status_mental', 'Status Mental', 'trim|required');
		

		$this->form_validation->set_rules('aktifitas', 'Aktifitas', 'trim|required');
		

		$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'trim|required');
		

		$this->form_validation->set_rules('inkontinensia', 'Inkontinensia', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_pasien' => $this->input->post('nama_pasien'),
				'nama_ruangan' => $this->input->post('nama_ruangan'),
				'Tanggal_lahir' => $this->input->post('Tanggal_lahir'),
				'Tanggal' => $this->input->post('Tanggal'),
				'Jam' => $this->input->post('Jam'),
				'Jenis_kelamin' => $this->input->post('Jenis_kelamin'),
				'kondisi_fisik' => $this->input->post('kondisi_fisik'),
				'status_mental' => $this->input->post('status_mental'),
				'aktifitas' => $this->input->post('aktifitas'),
				'mobilitas' => $this->input->post('mobilitas'),
				'inkontinensia' => $this->input->post('inkontinensia'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_form_dekubitus = $id = $this->model_form_dekubitus->store($save_data);
            

			if ($save_form_dekubitus) {
				
				$id = $save_form_dekubitus;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_dekubitus;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_dekubitus/edit/' . $save_form_dekubitus, 'Edit Form Dekubitus'),
						anchor('administrator/form_dekubitus', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_dekubitus/edit/' . $save_form_dekubitus, 'Edit Form Dekubitus')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_dekubitus');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_dekubitus');
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
	* Update view Form Dekubituss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_dekubitus_update');

		$this->data['form_dekubitus'] = $this->model_form_dekubitus->find($id);

		$this->template->title('Form Dekubitus Update');
		$this->render('backend/standart/administrator/form_dekubitus/form_dekubitus_update', $this->data);
	}

	/**
	* Update Form Dekubituss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_dekubitus_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'trim|required|max_length[30]');
		

		$this->form_validation->set_rules('Tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('Tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('Jam', 'Jam', 'trim|required|max_length[10]');
		

		$this->form_validation->set_rules('Jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('kondisi_fisik', 'Kondisi Fisik', 'trim|required');
		

		$this->form_validation->set_rules('status_mental', 'Status Mental', 'trim|required');
		

		$this->form_validation->set_rules('aktifitas', 'Aktifitas', 'trim|required');
		

		$this->form_validation->set_rules('mobilitas', 'Mobilitas', 'trim|required');
		

		$this->form_validation->set_rules('inkontinensia', 'Inkontinensia', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_pasien' => $this->input->post('nama_pasien'),
				'nama_ruangan' => $this->input->post('nama_ruangan'),
				'Tanggal_lahir' => $this->input->post('Tanggal_lahir'),
				'Tanggal' => $this->input->post('Tanggal'),
				'Jam' => $this->input->post('Jam'),
				'Jenis_kelamin' => $this->input->post('Jenis_kelamin'),
				'kondisi_fisik' => $this->input->post('kondisi_fisik'),
				'status_mental' => $this->input->post('status_mental'),
				'aktifitas' => $this->input->post('aktifitas'),
				'mobilitas' => $this->input->post('mobilitas'),
				'inkontinensia' => $this->input->post('inkontinensia'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_form_dekubitus = $this->model_form_dekubitus->change($id, $save_data);

			if ($save_form_dekubitus) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_dekubitus', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_dekubitus');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_dekubitus');
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
	* delete Form Dekubituss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_dekubitus_delete');

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
            set_message(cclang('has_been_deleted', 'form_dekubitus'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_dekubitus'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Dekubituss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_dekubitus_view');

		$this->data['form_dekubitus'] = $this->model_form_dekubitus->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Dekubitus Detail');
		$this->render('backend/standart/administrator/form_dekubitus/form_dekubitus_view', $this->data);
	}
	
	/**
	* delete Form Dekubituss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_dekubitus = $this->model_form_dekubitus->find($id);

		
		
		return $this->model_form_dekubitus->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_dekubitus_export');

		$this->model_form_dekubitus->export(
			'form_dekubitus', 
			'form_dekubitus',
			$this->model_form_dekubitus->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_dekubitus_export');

		$this->model_form_dekubitus->pdf('form_dekubitus', 'form_dekubitus');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_dekubitus_export');

		$table = $title = 'form_dekubitus';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_dekubitus->find($id);
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


/* End of file form_dekubitus.php */
/* Location: ./application/controllers/administrator/Form Dekubitus.php */