<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_home', 'homeModel');
	}

	public function index()
	{
		$this->data['sumIncome']		= $this->homeModel->getSumIncome()->row();
		$this->data['sumExpense']		= $this->homeModel->getSumExpense()->row();
		$this->data['getTransaction']	= $this->homeModel->getTransaction()->result();
		$this->data['people'] 			= $this->homeModel->getPeople()->result();
		$this->data['title'] 			= 'Home';
		$this->load->view('home', $this->data);
	}

	// Income
	public function income()
	{
		$this->data['getData'] = $this->homeModel->getIncome()->result();
		$this->data['getDate'] = $this->homeModel->getIncomeDate()->result();
		$this->data['title'] = 'Pemasukan';
		$this->load->view('income', $this->data);
	}

	public function directAddIncome()
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$people_id 		= $this->input->post('people');
			$date 			= $this->input->post('date');
			$description 	= $this->input->post('description');
			$amount 		= $this->input->post('amount');

			$this->form_validation->set_rules('amount', 'Harga', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'people_id' 	=> $people_id,
					'date' 			=> $date,
					'description' 	=> $description,
					'amount' 		=> $amount,
					'created_date' 	=> date('Y-m-d H:i:s')

				);
				$this->homeModel->addIncome($data);
				$this->session->set_flashdata('success', 'Data telah berhasil ditambahkan');
				redirect('Home/income');
			}
		}
	}

	public function addIncome()
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$people_id 		= $this->input->post('people');
			$date 			= $this->input->post('date');
			$description 	= $this->input->post('description');
			$amount 		= $this->input->post('amount');

			$this->form_validation->set_rules('amount', 'Harga', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'people_id' 	=> $people_id,
					'date' 			=> $date,
					'description' 	=> $description,
					'amount' 		=> $amount,
					'created_date' 	=> date('Y-m-d H:i:s')

				);
				$this->homeModel->addIncome($data);
				$this->session->set_flashdata('success', 'Data telah berhasil ditambahkan');
				redirect('Home/income');
			}
		}
		$this->data['people'] 	= $this->homeModel->getPeople()->result();
		$this->data['title'] 	= 'Menambahkan Daftar Pemasukan';
		$this->load->view('incomeForm', $this->data);
	}

	public function editIncome($id)
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$people_id 		= $this->input->post('people');
			$date 			= $this->input->post('date');
			$description 	= $this->input->post('description');
			$amount 		= $this->input->post('amount');

			$this->form_validation->set_rules('amount', 'Harga', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'people_id' 	=> $people_id,
					'date' 			=> $date,
					'description' 	=> $description,
					'amount' 		=> $amount,
					'updated_date' 	=> date('Y-m-d H:i:s')
				);
				$this->homeModel->updateIncome($id, $data);
				$this->session->set_flashdata('success', 'Data telah berhasil diperbaharui');
				redirect('Home/income');
			}
		}
		$this->data['people'] 	= $this->homeModel->getPeople()->result();
		$this->data['getRow'] 	= $this->homeModel->getIncomeId($id)->row();
		$this->data['title'] 	= 'Mengubah Data Pemasukan';
		$this->data['edit'] 	= TRUE;
		$this->load->view('incomeForm', $this->data);
	}

	public function deleteIncome($id)
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		$this->homeModel->deleteIncome($id);
		$this->session->set_flashdata('danger', 'Data telah berhasil dihapus');
		redirect('Home/income');
	}

	// Expense
	public function expense()
	{
		$this->data['getData'] = $this->homeModel->getExpense()->result();
		$this->data['getDate'] = $this->homeModel->getExpenseDate()->result();
		$this->data['title'] = 'Pengeluaran';
		$this->load->view('expense', $this->data);
	}

	public function directAddExpense()
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$date 			= $this->input->post('date');
			$item 			= $this->input->post('item');
			$total 			= $this->input->post('total');
			$amount 		= $this->input->post('amount');

			$this->form_validation->set_rules('item', 'Item', 'required');
			$this->form_validation->set_rules('total', 'Total', 'required');
			$this->form_validation->set_rules('amount', 'Harga', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'date' 			=> $date,
					'item' 			=> $item,
					'total' 		=> $total,
					'amount' 		=> $amount,
					'total_amount' 	=> $total * $amount,
					'created_date' 	=> date('Y-m-d H:i:s')

				);
				$this->homeModel->addExpense($data);
				$this->session->set_flashdata('success', 'Data telah berhasil ditambahkan');
				redirect('Home/expense');
			}
		}
	}

	public function addExpense()
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$date 			= $this->input->post('date');
			$item 			= $this->input->post('item');
			$total 			= $this->input->post('total');
			$amount 		= $this->input->post('amount');

			$this->form_validation->set_rules('item', 'Item', 'required');
			$this->form_validation->set_rules('total', 'Total', 'required');
			$this->form_validation->set_rules('amount', 'Harga', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'date' 			=> $date,
					'item' 			=> $item,
					'total' 		=> $total,
					'amount' 		=> $amount,
					'total_amount' 	=> $total * $amount,
					'created_date' 	=> date('Y-m-d H:i:s')

				);
				$this->homeModel->addExpense($data);
				$this->session->set_flashdata('success', 'Data telah berhasil ditambahkan');
				redirect('Home/expense');
			}
		}
		$this->data['people'] 	= $this->homeModel->getPeople()->result();
		$this->data['title'] 	= 'Menambahkan Daftar Pengeluaran';
		$this->load->view('expenseForm', $this->data);
	}

	public function editExpense($id)
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$date 			= $this->input->post('date');
			$item 			= $this->input->post('item');
			$total 			= $this->input->post('total');
			$amount 		= $this->input->post('amount');

			$this->form_validation->set_rules('item', 'Item', 'required');
			$this->form_validation->set_rules('total', 'Total', 'required');
			$this->form_validation->set_rules('amount', 'Harga', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'date' 			=> $date,
					'item' 			=> $item,
					'total' 		=> $total,
					'amount' 		=> $amount,
					'total_amount' 	=> $total * $amount,
					'updated_date' 	=> date('Y-m-d H:i:s')
				);
				$this->homeModel->updateExpense($id, $data);
				$this->session->set_flashdata('success', 'Data telah berhasil diperbaharui');
				redirect('Home/expense');
			}
		}
		$this->data['people'] 	= $this->homeModel->getPeople()->result();
		$this->data['getRow'] 	= $this->homeModel->getExpenseId($id)->row();
		$this->data['title'] 	= 'Mengubah Data Pengeluaran';
		$this->data['edit'] 	= TRUE;
		$this->load->view('expenseForm', $this->data);
	}

	public function deleteExpense($id)
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		$this->homeModel->deleteExpense($id);
		$this->session->set_flashdata('danger', 'Data telah berhasil dihapus');
		redirect('Home/expense');
	}


	// Cash
	public function cash()
	{
		$this->data['getCash']		= $this->homeModel->getCash()->result();
		$this->data['getCashMax']	= $this->homeModel->getCashMax()->row();
		$this->data['title'] 		= 'Kas';
		$this->load->view('cash', $this->data);
	}


	// User
	public function user()
	{
		$this->data['getData'] = $this->homeModel->getPeople()->result();
		$this->data['title'] = 'List Anak';
		$this->load->view('user', $this->data);
	}

	public function addUser()
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$name 		= $this->input->post('name');
			$ttl 		= $this->input->post('ttl');
			$address 	= $this->input->post('address');

			$this->form_validation->set_rules('name', 'Nama', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'name' 		=> $name,
					'ttl' 		=> $ttl,
					'address' 	=> $address
				);
				$this->homeModel->addPeople($data);
				$this->session->set_flashdata('success', 'Data telah berhasil ditambahkan');
				redirect('Home/user');
			}
		}
		$this->data['title'] 	= 'Menambahkan Daftar Anak';
		$this->load->view('userForm', $this->data);
	}

	public function editUser($id)
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		if (isset($_POST['submit'])) {
			$name 		= $this->input->post('name');
			$ttl 		= $this->input->post('ttl');
			$address 	= $this->input->post('address');

			$this->form_validation->set_rules('name', 'Nama', 'required');
			if ($this->form_validation->run()) {
				$data = array(
					'name' 		=> $name,
					'ttl' 		=> $ttl,
					'address' 	=> $address
				);
				$this->homeModel->updatePeople($id, $data);
				$this->session->set_flashdata('success', 'Data telah berhasil diperbaharui');
				redirect('Home/user');
			}
		}
		$this->data['getRow'] 	= $this->homeModel->getPeopleId($id)->row();
		$this->data['title'] 	= 'Mengubah Data Anak';
		$this->data['edit'] 	= TRUE;
		$this->load->view('userForm', $this->data);
	}

	public function deleteUser($id)
	{
		if ($this->session->userdata('login') != true) {
			$this->session->set_flashdata('warning', 'Anda harus login terlebih dahulu');
			redirect('Login');
		}

		$this->homeModel->deletePeople($id);
		$this->session->set_flashdata('danger', 'Data telah berhasil dihapus');
		redirect('Home/user');
	}
}
