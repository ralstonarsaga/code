<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vr_demo extends CI_Controller 

{

public function __construct()
	{
		parent::__construct();
		$this->load->library('unirest');
	}

	function index()
	{		
$img='C:/Users/dsbelando/Desktop/bottle.jpg';
$url='https://gateway-a.watsonplatform.net/visual-recognition/api/v3/classify?api_key={75aa1f9be365f111a14ac96251f8bb8bebb283a3}&version=2016-05-20';

$data = array(
        'image' => new CurlFile($img)
    );
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt_array($curl, array(
		  CURLOPT_POST => true,
		  CURLOPT_URL => $url,
		  CURLOPT_USERPWD => "don.belando@gmail.com:Speci@l27",
		  CURLOPT_POSTFIELDS => $data,
		  CURLOPT_RETURNTRANSFER => true

		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}

		// if (isset($_FILES['uploadedfile']) && $_POST != "") {
    // $targetPath = 'uploads/' . basename($_FILES['uploadedfile']['name']);
    //$url = 'https://gateway-a.watsonplatform.net/visual-recognition/api/v3/classify?api_key={75aa1f9be365f111a14ac96251f8bb8bebb283a3}&version=2016-05-20';
    // $post_data = array(
    //     'file' =>
    //     '@' . $_FILES['uploadedfile']['tmp_name']
    //     . ';filename=' . $_FILES['uploadedfile']['name']
    //     . ';type=' . $_FILES['uploadedfile']['type']
    // );

//     $img='C:/Users/dsbelando/Desktop/bottle.jpg';

// $post_data = array("images_file" => new CURLFile($img,mime_content_type($img),basename($img)));


//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     $headers = array();
//     $headers[] = "Content-Type: multipart/form-data";
//     $headers[] = "Accept: application/json";
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     $result = curl_exec($ch);
//     if (curl_errno($ch)) {
//         echo 'Error:' . curl_error($ch);
//         die;
//     }
//     var_dump($result, true);
//     die;
// }


// $jpg ='C:/Users/dsbelando/Desktop/bottle.jpg';
// $url = 'https://gateway-a.watsonplatform.net/visual-recognition/api/v3/classify?api_key={75aa1f9be365f111a14ac96251f8bb8bebb283a3}&version=2016-05-20';
// $username='don.belando@gmail.com';
// $password='Speci@l27';

// $curl = curl_init();
// $data = array("images_file" => new CURLFile($jpg,mime_content_type($jpg),basename($jpg)));
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_POST, TRUE);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
// curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
// curl_setopt($curl, CURLOPT_USERPWD,"$username:$password");
// $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);


// $vr_exec = curl_exec($curl);
// curl_close($curl);
// $re = json_decode($vr_exec,true);
// print_r($re); 
// //var_dump($re, true);
// print_r($code);

//}
}