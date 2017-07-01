<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';

class classifier extends CI_Controller {
	/**
	 * Carrega a página principal
	 */
	public function Index()
	{
		$this->load->helper('directory'); //load directory helper
		$dir = "uploads/images/"; // Your Path to folder
		
		$data = array(
		    'dirs' => "uploads/images/",
		    'imgs' => directory_map($dir)
		);

		$this->load->view('classify_view',$data);


	}

	/**
	 * Método para processar os dados enviados no formulário: tipo de processamento e URL da imagem
	 */
	public function recognition()
	{
		// Carrega a biblioteca auxiliar com as requisições à API do IBM Watson
		$this->load->library('IBMWatsonVR');

		// Verifica o tipo de verificação será feita na imagem: classificação ou detecção de rosto
		// Executa o método da biblioteca IBMWatsonVR correspondente ao tipo de verificação
		// Define qual a view deverá ser carregada após o processamento da imagem
		switch ($this->input->post('type')) {
			case 1:
				$recognition = $this->ibmwatsonvr->Classify($this->input->post('url'));
				$view = 'recognition-classify-details';
				break;
			case 2:
				$recognition = $this->ibmwatsonvr->DetectFaces($this->input->post('url'));
				$view = 'recognition-detect-faces-details';
				break;
			default:
				$recognition = $this->ibmwatsonvr->Classify($this->input->post('url'));
				$view = 'recognition-classify-details';
				break;
		}

		// Caso o processamento retorne algum erro, esse é recuperado e é aberta a página para exibição do erro
		// Se não retornar erro então é feito o tratamento das informações retornadas pela API
		if ($recognition['status_code'] >= 400) {
			$data['message'] = $recognition['response']->error->description;
			$view = 'recognition-error';
		} else {
			if ($this->input->post('type') == 1) {
				$data['infos'] = $this->ClassifyFormat($recognition['response']);
			} elseif ($this->input->post('type') == 2) {
				$data['infos'] = $this->DetectFacesFormat($recognition['response']);
			}
		}

		// Carrega a view para exibição das informações da imagem ou erro
		$this->load->view($view,$data);
	}

	/**
	 * Método utilizado para formatar os dados retornados pela API quando for feita a classificação da imagem
	 * Esse método pode ser personalizado conforme a necessidade da aplicação
	 *
	 * @param object $data  Objeto contendo as informações retornadas pela API
	 * @return array $infos Array contendo as informações reorganizadas
	 */
	private function classifyFormat($data)
	{
		$count = 0;
		// Faz a iteração para cada imagem que teve dados retornados
		// E então faz as iterações necessárias dentro das informações de cada imagem
		foreach ($data->images as $image) {
			$infos[$count]['image_url'] = $image->source_url;

			$classified = array();
			foreach ($image->classifiers as $classifier) {
				foreach ($classifier->classes as $details) {
					$class_details = get_object_vars($details);
					$classified[] = $class_details['class'];
				}
			}

			$infos[$count]['classifier'] = $classified;
			$count++;
		}

		return $infos;
	}

}
