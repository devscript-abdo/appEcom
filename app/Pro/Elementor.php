<?php

/*add_action('elementor_pro/forms/new_record', function ($record, $ajax_handler) {

    $raw_fields = $record->get('fields');
    $fields = [];
    foreach ($raw_fields as $id => $field) {
        $fields[$id] = $field['value'];
    }

    global $wpdb;
    $output['success'] = $wpdb->insert('demo', array('name' => $fields['name'], 'email' => $fields['email'], 'message' => $fields['message']));

    $ajax_handler->add_response_data(true, $output);
}, 10, 2);


add_action( 'elementor_pro/forms/form_submitted', function($module ) {
    
    // $module->add_component( 'uploads_handler', new Uploads_Handler() );
    
   // var_dump($_FILES);
   // die();
     
 $mydb = new wpdb('haymac_mous','wx66@ofg123456','haymac_mous','localhost');
 

     
 
 
 $mydb->insert("inscriptions", array(
     
    "nomComplet" =>trim($_POST['form_fields']['nom']),
    "dateNissance" =>trim($_POST['form_fields']['dateNissance']),
    "sexe" =>trim($_POST['form_fields']['sexe']),
    "telephone" =>trim($_POST['form_fields']['telephone']),
    "email" =>trim($_POST['form_fields']['email']),
    "adresse" =>trim($_POST['form_fields']['adresse']),
    "ville" =>trim($_POST['form_fields']['ville']),
    "diplome" =>trim($_POST['form_fields']['diplome']),
    "cnss" =>trim($_POST['form_fields']['cnss']),
    "dateCnss" =>trim($_POST['form_fields']['cnss_date']),
    "cartCNI" =>"http://moustakbaly.haymacproduction.ma/wp-content/uploads/elementor/forms/".trim($_POST['form_fields']['telephone']).'-'.$_FILES['form_fields']['name']['cartNational'],
    "codePer"=>'MOUS-' . rand()
 
 ));
 
 echo $mydb->suppress_errors;
 echo $mydb->show_errors;
 
 } );*/