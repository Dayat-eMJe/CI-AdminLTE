<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('admin/course');
        $this->load->model('admin/Course_model', 'm_course');

        /* Title Page :: Common */
		$this->page_title->push(lang('menu_course'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_course'), 'admin/course');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['courses'] = $this->m_course->get_ten_entries();
            //$this->data['groups'] = $this->ion_auth->groups()->result();

            /* Load Template */
            $this->template->admin_render('admin/course/index', $this->data);
        }
    }


	public function create()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_course_create'), 'admin/course/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('course_code', 'lang:course_code', 'required|alpha_dash');
		$this->form_validation->set_rules('course_name', 'lang:course_name', 'required|alpha_dash');

		if ($this->form_validation->run() == TRUE)
		{
			$new_course_id = $this->m_course->create($this->input->post('course_code'), $this->input->post('course_name'));
			if ($new_course_id)
			{
				$this->session->set_flashdata('message', $this->lang->line('course_add_saved'));
				redirect('course');
					//$this->index();
			}
			else{
				$this->session->set_flashdata('message', $this->lang->line('course_error'));
				redirect('course');
			}
		}
		else
		{
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['course_code'] = array(
				'name'  => 'course_code',
				'id'    => 'course_code',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('course_code')
			);
			$this->data['course_name'] = array(
				'name'  => 'course_name',
				'id'    => 'course_name',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('course_name')
			);

            /* Load Template */
            $this->template->admin_render('admin/course/create', $this->data);
		}
	}





	public function edit($id)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin() OR ! $id OR empty($id))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_course_edit'), 'admin/course/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */

		$courses = $this->m_course->course_by_id($id);

		/* Validate form input */
        $this->form_validation->set_rules('course_code', $this->lang->line('course_code'), 'required|alpha_dash');
        $this->form_validation->set_rules('course_name', $this->lang->line('course_name'), 'required');

		if (isset($_POST) && ! empty($_POST))
		{
			if ($this->form_validation->run() == TRUE)
			{
				$course_update = $this->m_course->update($id, $_POST['course_code'], $_POST['course_name']);

				if ($course_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('course_edit_saved'));

                   
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}

				redirect('course');
				//$this->index();
			}
		}


		    $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['course_code'] = array(
				'name'  => 'course_code',
				'id'    => 'course_code',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('course_code',$courses->course_code),
				'readonly' => 'readonly'
			);
			$this->data['course_name'] = array(
				'name'  => 'course_name',
				'id'    => 'course_name',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('course_name',$courses->course_name)
			);

            /* Load Template */
            $this->template->admin_render('admin/course/edit', $this->data);
	}


	public function delete($id)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin() OR ! $id OR empty($id))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_course_delete'), 'admin/course/delete');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */

		$courses = $this->m_course->course_by_id($id);

		/* Validate form input */
        $this->form_validation->set_rules('course_code', $this->lang->line('course_code'), 'required|alpha_dash');
        $this->form_validation->set_rules('course_name', $this->lang->line('course_name'), 'required');

		if (isset($_POST) && ! empty($_POST))
		{
			if ($this->form_validation->run() == TRUE)
			{
				$course_deleted = $this->m_course->delete($id);

				if ($course_deleted)
				{
					$this->session->set_flashdata('message', $this->lang->line('course_deleted'));

                   
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}

				redirect('course');
				//$this->index();
			}
		}


		    $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['course_code'] = array(
				'name'  => 'course_code',
				'id'    => 'course_code',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('course_code',$courses->course_code),
				'readonly' => 'readonly'
			);
			$this->data['course_name'] = array(
				'name'  => 'course_name',
				'id'    => 'course_name',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('course_name',$courses->course_name),
				'readonly' => 'readonly'
			);

            /* Load Template */
            $this->template->admin_render('admin/course/delete', $this->data);
	}
}
