 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 if (! function_exists('pagination')) 
 {
 	function pagination($total_rows, $per_page,$url2='',$url=null,$uri_segment = 3)
 	{
 		$ci =& get_instance();
 		if (is_null($url)) {
 			$segment[] = $ci->router->class;
 			$segment[] = $ci->router->method;
 			$url = implode("/", $segment);
 		}
        
 		$config = array();
 		$config['base_url'] = base_url($url).$url2;
 		$config['total_rows'] =$total_rows;
 		 $config['uri_segment'] = $uri_segment;
 		$config['per_page'] = $per_page;
 		
    	$config['uri_segment'] = 3;
    	$config['num_links'] = 5;  
    	$config['first_tag_open'] = '<li>';
    	$config['first_link'] = 'First';
    	$config['first_tag_close'] = '</li>';
    	$config['prev_link'] = 'Sebelumnya';
    	$config['prev_tag_open'] = '<li>';
    	$config['prev_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="active"><a href>';
    	$config['cur_tag_close'] = '</a></li>';
    	$config['next_link'] = 'Selanjutnya';
    	$config['next_tag_open'] = '<li>';
    	$config['next_tag_close'] = '</li>';
    	$config['num_tag_open'] = '<li>';
    	$config['num_tag_close'] = '</li>';
    	$config['last_tag_open'] = '<li>';
    	$config['last_link'] = 'Last';
    	$config['last_tag_close'] = '</li>';

 		$ci->load->library('pagination');
 		$ci->pagination->initialize($config);
 		return $ci->pagination->create_links();
 	}
 }
 ?>