<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;
class dompdf_lib{
	public function __construct(){

	require_once dirname(__FILE__).'/dompdf/autoload.inc.php';
	$options = new Options();
	$options->set('isRemoteEnabled', TRUE); // for displaying images in pdf file
	//$pdf = new DOMPDF();
	$pdf = new DOMPDF($options);
	$CI = & get_instance();
	$CI->dompdf = $pdf;
	}
}
?>