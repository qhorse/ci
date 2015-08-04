<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Article_model','article');
        $data['info'] = $this->article->check();

		$num = 3;
	    $page = $this->uri->segment(3);
	    if(empty($page)){
	        $start = 0;
	     }else{
	        $start = $page;
	      }
	    $data['results'] = $this->article->check($start, $num);


        $tota = count($data['info']);
        $this->load->library('pagination');
		$config['base_url'] = 'http://demo.cc/Codeigniter/index.php';
		$config['total_rows'] = $tota;  //配置记录总条数                     
		$config['per_page'] = $num; //配置每页显示的记录数
		$config['use_page_numbers'] = TRUE;      
		$this->pagination->initialize($config);
 		$this->load->view('index',$data);
	}

	/**
	 * 添加文章
	 */

	public function add()
	{
		$this->load->helper('form');
		$this->load->view('add');
	}

	/**
	 * 储存信息
	 */

	public function save()
	{
		$data1 = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'release_time' => time(),
		);
		$this->load->model('article_model','article');
		$this->article->add($data1);
		$data['info'] = $this->article->check();
		$this->load->view('index',$data);
	}

	/**
	 * 编辑
	 */

	public function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->model('article_model','article');
		$data['info'] = $this->article->get_one($id);
		$this->load->helper('form');
		$this->load->view('edit',$data);
	}

	/**
	 * 更新
	 */

	public function upsave()
	{
		$id = $this->input->post('id');
		$info = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'release_time' => time(),
		);
		$this->load->model('article_model','article');
		$this->article->up($id,$info);
		$data['info'] = $this->article->check();
		$this->load->view('index',$data);
	}




	/**
	 * 删除
	 */

	public function del()
	{
		$id = $this->uri->segment(3);
		$this->load->model('article_model','article');
		$this->article->del($id);
		$data['info'] = $this->article->check();
		$this->load->view('index',$data);
	}


}
