<?php

function porternovelli_preprocess_node(&$vars) {
$language = 'und';



if ($vars['node']->type = 'over'){	
	$aantalvideos = ($vars['node']->field_video['und']);	
	$aantalvideos = count($aantalvideos);
	if (isset($vars['node']->field_video['und'][0])) {
		for ($i = 0; $i <= ($aantalvideos -1); $i++) {
			$vars['videos'] [] = '<div style="float:left; margin-right:5px;"><iframe src="http://player.vimeo.com/video/'.$vars['node']->field_video['und'][$i]['value'].'" width="465" height="261" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
			}	
		}
	}/* --- END VIDEO ---*/


if (isset($vars['node']->field_bestand['und'][0]['filename'])){
		$aantalbijlagen = count($vars['node']->field_bestand['und']);
		for($i=0; $i <=$aantalbijlagen-1; $i++){
				$vars['bestanden'] []= '<p><img src="/sites/all/themes/porternovelli/images/dowload_pn.gif"> <a href="/sites/default/files/upload_images/'.($vars['node']->field_bestand['und'][$i]['filename']).'">'.$vars['node']->field_bestand['und'][$i]['filename'].'</a></p>';
				
		}
}

}/*---END PREPROCESS NODE---*/


function porternovelli_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
  	if ($vars['node']->type =='discipline' || $vars['node']->type =='specialty') {
   	 	$vars['theme_hook_suggestions'][] = 'page__diensten';
  		}
		
		//kpr($vars);
		
  }

	
	
 	$vars['disciplines']=24; 
 	$vars['specialty'] = 25;
  	
	if($vars['node']->type == 'discipline'){
		$vars['disciplines'] = ($vars['node']->nid);}
	
	if($vars['node']->type == 'specialty'){
  		$vars['specialty'] =($vars['node']->nid);} 
		
		
		 
 if($vars['node']->type == 'nieuws'){
$vars['printed_title'] = 'Nieuws';
 }
 
 //kpr($vars);
 
}/*---END PREPROCESS PAGE---*/

