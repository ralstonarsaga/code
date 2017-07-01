<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * IBM Watson - Visual Recognition
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	IMB Watson
 * @author		Jonathan Lamim Antunes <dev@jlamim.com.br>
 * @link		https://github.com/jlamim/codeigniter-ibm-watson-visual-recognition
 * @version	    0.0.1
 */

class Vr {

    var $api_url = 'https://gateway-a.watsonplatform.net/visual-recognition';
    var $api_key = '75aa1f9be365f111a14ac96251f8bb8bebb283a3';
    var $api_version = '2016-05-20';

    /**
     * Método utilizado para obter as informações de classificação de uma imagem
     * através da URL da mesma usando a API do Visual Recognition
     *
     * @param string $image_url URL da imagem a ser classificada
     * @return array
     *
     */
    public function classify($image_url)
    {
        // Define os cabeçalhos da requisição HTTP
        $headers = array('Accept' => 'application/json');

        // Define as informações de autenticação e a URL da imagem que deverá ser processada
		$query = array(
			'api_key' => $this->api_key,
			'version' => $this->api_version,
			'url' => $image_url
		);

        // Faz a requisição HTTP usando o verbo GET e o endpoint da API
		$response = Unirest\Request::get($this->api_url.'v3/classify', $headers, $query);

        // Define as informações que serão retornadas (código de status da operação e dados retornados)
        $data['status_code'] = $response->code;
        $data['response'] = $response->body;

        // Retorna os dados
        return $data;
    }

}
