<?php
class Pagefile extends CI_Controller{  
	public function __construct(){
	    parent::__construct();    
	    $this->load->library('pagination'); //系统的library    
	    $this->load->model('mpage');    //调数据库数据     
	    $this->load->helper('url');       //系统的帮助类   
	}  
	function index(){   
	//总记录数  
	$date=$this->mpage->gettotal();        
	$number=$date[0]->total;                  
	$config['base_url'] = site_url('pagefile/index/'); //路径              
	$config['total_rows'] = $number;  //配置记录总条数                     
	$config['per_page'] = 3; //配置每页显示的记录数     
	//        
	$config['first_tag_open'] = '<div>';     
	//        
	$config['first_tag_close'] = '</div>';             
	$config['uri_segment'] = 3;             
	$config['next_link'] = '下一页';             
	$config['prev_link'] = '上一页';             
	$config['last_link'] = '末页';             
	$config['first_link'] = '首页';              //配置分页导航当前页两边显示的条数             
	$config['num_links'] = 4;              //配置偏移量在url中的位置           
	$config['cur_page'] = $this->uri->segment(3);              //配置分页类                         
	$tab['table']=$this->mpage->get_books($config ['per_page'], $this->uri->segment(3));//当前页显示的数据               
	$this->pagination->initialize($config);     
	$this->load->view('index',$tab);   //调页面  传数据

	}  
} 