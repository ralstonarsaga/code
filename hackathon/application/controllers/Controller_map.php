<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Controller_map extends CI_Controller {
	/**
	 * Carrega a página principal
	 */
	public function Index()
	{
		$this->load->library('googlemaps');
		$this->load->model('location_model');

		$data['groups'] = $this->delivery_model->getAllGroups();
		
		$config = array();
		$config['center'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
			var mapCentre = map.getCenter();
			marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
			});
		}
		centreGot = true;';
		$this->googlemaps->initialize($config);
		   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('view_map', $data);
		
	}

}
