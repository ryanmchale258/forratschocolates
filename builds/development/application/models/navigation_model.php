<?php

class Navigation_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getNav() {
		$menu = "";

		$this->db->select('*');
		$this->db->order_by('pages_weight', 'desc');
		$this->db->where('pages_navlvl', 1);
		$navall = $this->db->get('tbl_pages')->result();

		$this->db->select('*');
		$this->db->or_where('pages_navlvl', 2);
		$navkids = $this->db->get('tbl_pages')->result();


		foreach($navall as $row){
			$children = array();
				foreach($navkids as $subrow){
					if($subrow->pages_navprnt == $row->pages_slug){
						$row->pages_haskids = 1;
						$childitems = array();
						$childitems['childname'] = $subrow->pages_title;
						$childitems['childlink'] = $subrow->pages_slug;
						$childitems['controller'] = $subrow->pages_hascontroller;
						$children[] = $childitems;
					}
				}
			if($row->pages_haskids == 1){
				$menu .= '<li class="has-submenu"><a id="' . $row->pages_slug . '" href="#menu-' . $row->pages_slug . '">';
				$menu .= $row->pages_title . '</a>';
				$menu .= '<ul id="menu-' . $row->pages_slug . '" class="submenu">';
					if($row->pages_hascontroller == 1){
						$menu .= '<li><a id="' . $row->pages_slug . '" href="' . base_url() . index_page() . '/' . $row->pages_slug . '">';
					}else{
						$menu .= '<li><a id="' . $row->pages_slug . '" href="' . base_url() . index_page() . '/page/' . $row->pages_slug . '">';
					}
					$menu .= $row->pages_title . '</a></li>';


					foreach($children as $kids){
						if($kids['controller'] == 1){
							$menu .= '<li><a id="' . $row->pages_slug . '" href="' . base_url() . index_page() . '/' . $kids['childlink'] . '">' . $kids['childname'] . '</a></li>';
						}else{
							$menu .= '<li><a id="' . $row->pages_slug . '" href="' . base_url() . index_page() . '/page/' . $kids['childlink'] . '">' . $kids['childname'] . '</a></li>';
						}
					}
					$menu .= '<li class="back"><a href="#back">Back</a></li>';

				$menu .= '</ul>';
				$menu .= '</li>';
			}else{
				if($row->pages_hascontroller == 0){
					$menu .= '<li><a id="' . $row->pages_slug . '" href="' . base_url() . index_page() . '/page/' . $row->pages_slug . '">';
				}else{
					$menu .= '<li><a id="' . $row->pages_slug . '" href="' . base_url() . index_page() . '/' . $row->pages_slug . '">';
				}
				$menu .= $row->pages_title;
				$menu .= '</a></li>';
			}
		}

		return $menu;
	}

	public function getParents(){
		$parents = $this->db->get_where('tbl_pages', array( 'pages_navlvl' => 1 ));
		return $parents->result();
	}

}