<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('session');
		$this->load->model('tank_auth/users');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			
			$data['other_page'] = false;
			$data['page'] = 'admin_home';
			$this->load->view('admin_theme/admin_containt', $data);
			  
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
			/*$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
			$data['firstname'] = $user_data->firstname;
			$data['lastname'] = $user_data->lastname;
			
			if( !$this->session->userdata('image') == '' ){
			$data['image'] = $this->session->userdata('image');
			}else{
			$data['image'] = '/images/blank_man.gif';
			}
			
			$this->load->view('welcome', $data);
			//echo $this->session->userdata('user_id');
			*/
		}
	}
	function add_rooms_form()
	{
			$data['other_page'] = false;
			$data['get_rooms'] = $this->logic->global_get('hotel_room');
			$data['page'] ='add_room';
			$this->load->view('admin_theme/admin_containt', $data);
	}
	function service()
	{
		$data['page'] ='service';
		$data['other_page'] = true;
		
		$this->load->view('template/containt', $data);
	}
	function contact()
	{
		$data['page'] ='contact_us';
		$data['other_page'] = true;		
		$this->load->view('template/containt', $data);
	}
	function add_room()
	{
		$data['get_rooms'] = $this->logic->global_get('hotel_room');
		$this->form_validation->set_rules('number_of_room','Number of Room','required|integer');
		$this->form_validation->set_rules('room_type','Room Type','required|trim|is_unique[hotel_room.room_type]');
		$this->form_validation->set_rules('room_price' ,'Room Price','required|trim|numeric');
		if($this->form_validation->run() === false)
		{
			$this->add_rooms_form();
		}
		else
		{
			$room = array(
				      'number_of_room'=>$this->input->post('number_of_room'),
				      'room_type'=>$this->input->post('room_type'),
				      'room_price'=>$this->input->post('room_price'),
				      );
			echo $this->logic->global_insert('hotel_room', $room);
		}
	}
	function add_customer()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('userid','Userid','required|is_unique[hotel_room.room_type]');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() === false)
		{
			$this->index();
		}
		else
		{
			$customer = array(
					  'customer_name'=>$this->input->post('name'),
					  'address'=>$this->input->post('address'),
					  'customer_id'=>$this->input->post('userid'),
					  'password'=>$this->input->post('password'),
					  );
			$insert_id = $this->logic->global_insert('add_customer', $customer);
			if($insert_id)
			{
				$newdata = array(
						 'customer_id'=>$this->input->post('userid')
						 );
				$this->session->set_userdata($newdata);
				//echo $insert_id;
				$this->booking_page();
			}
		}
	}
	function booking_page()
	{
		
					$where_field = array(
							     'customer_id'=>$this->session->userdata('customer_id'),
					);
					$data['get_record'] = $this->logic->global_get('booking_room', $where_field);
					$data['page'] ='booking_page';
					$data['other_page'] = true;
					$this->load->view('template/containt', $data);
		
	}
	function find_booking()
	{
		
			$this->form_validation->set_rules('customer_id','Customer Id', 'required');
			$this->form_validation->set_rules('password','Password', 'required');
			if($this->form_validation->run() === false)
			{
				$this->booking_page();
			}
			else
			{
				$userdata = array(
						  'customer_id'=>$this->input->post('customer_id'),
						  'password'=>$this->input->post('password'),
						  );
				$get_data = $this->logic->global_get('add_customer', $userdata);
				$num_rows = $get_data->num_rows();
				if($num_rows <= 0)
				{
					echo "You must register !<a href ='",base_url(),"'> Register Page</a>";
				}
				else
				{
					foreach($get_data->result() as $row)
					{
						echo $id = $row->id;
					}
					$where_field = array(
							     'customer_id'=>$id,
							     );
					$this->session->set_userdata($where_field);
					$data['get_record'] = $this->logic->global_get('booking_room', $where_field);
					$data['page'] ='booking_detail';
					$data['other_page'] = true;
					$this->load->view('template/containt', $data);
				}
				
			}
	}
	function customer_list()
	{
		
		$data['get_customer'] = $this->logic->global_get('add_customer');
		$data['page'] = 'customer_list';
		$this->load->view('admin_theme/admin_containt', $data);
	}
	function add_booking_detail()
	{
			
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('gander','Gander','required');
			$this->form_validation->set_rules('start_date','Start Date','required');
			$this->form_validation->set_rules('check_out_date','Check Out Date','required');
			
			if($this->form_validation->run() == false)
			{
				$this->booking_page();
			}
			else
			{
				$data = array(
				'customer_id'=>$this->session->userdata('customer_id'),
				'room_id'=>$this->input->post('room_type'),
				'name'=>$this->input->post('name'),
				'gander'=>$this->input->post('gander'),
				'start_date'=>strtotime($this->input->post('start_date')),
				'end_date'=>strtotime($this->input->post('check_out_date')),
				);
				$this->logic->global_insert('booking_room', $data);
			}		
	}
	function inventory_form()
	{
		//$data['other_page'] = true;
		$data['stock_detail'] = $this->logic->global_get('stock_detail');
		$data['page'] ='inventory';
		$this->load->view('admin_theme/admin_containt', $data);
	}
	function update_stock()
	{
		$this->form_validation->set_rules('product_name','Product Name', 'required|trim');
		$this->form_validation->set_rules('stock','Stock', 'integer');
		if($this->form_validation->run() == false)
		{
			$this->inventory_form();
		}
		else
		{
			$stock_detail = array(
						'product_name'=>$this->input->post('product_name'),
						'stock'=>$this->input->post('stock'),
						'current_use'=>$this->input->post('current_use'),
						'balance'=>$this->input->post('balance'),
					      );
			$insert_row = $this->logic->global_insert('stock_detail', $stock_detail);
			
			if($insert_row > 0)
			{
				$this->inventory_form();
			}
		}		
	}
	function employee_list()
	{
		$data['get_employee'] = $this->logic->global_get('employee');
		$data['page'] = 'employee_list';
		$this->load->view('admin_theme/admin_containt', $data);
	}
	function add_employee()
	{
		$this->form_validation->set_rules('employee_name', 'Employee Name', 'required|trim');
		$this->form_validation->set_rules('designation', 'Designation', 'required|trim');
		$this->form_validation->set_rules('payment', 'Payment', 'required|trim|');
		if($this->form_validation->run() == false)
		{
			$this->employee_list();
		}
		else
		{
			$employee_data = array(
					       'employee_name' => $this->input->post('employee_name'),
					       'designation' => $this->input->post('designation'),
					       'payment' => $this->input->post('payment'),
					       );
			$insert_row = $this->logic->global_insert('employee', $employee_data);
			if($insert_row > 0)
			{
				$this->employee_list();
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */