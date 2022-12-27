<?php

/**
* @file
*/

/**
* Реализация hook_form_alter() выводит идентификатор каждой формы.
*/
/*
function xray_form_alter(&$form, &$form_state, $form_id) {
    $form['xray_display_form_id'] = array(
        '#type' => 'item',
        '#title' => t('Form ID'),
        '#markup' => $form_id,
        '#weight' => -100,
    );
}
*/


/* i'm here */
/**
 * Реализация hook_node_info().
 */
function xray_node_info() {
  return array(
    'act_opening_pc' => array(
      'name' => 'Акт о вскрытии системного блока',
      'base' => 'node_content',
      'description' => 'Акт содержит информацию о вскрытии системного блока.',
      'has_title' => FALSE,
      'locked' => TRUE,
    )
  );
}

/**
 * Реализация hook_menu().
 */
function xray_menu() {
/*
  $items['node/%node/openpc'] = array(
    'title' => 'Компьютеры',
    'access callback' => 'sup_sziflow_skzicab_hosts_access',
    'access arguments' => array(1),
    'page callback' => 'sup_sziflow_skzicab_hosts',
    'page arguments' => array(1),
//     'file' => 'includes/sup_sziflow.tmp.inc',
    'type' => MENU_CALLBACK,
//    'weight' => 15,
  );
*/
  
  $items['node/%/openpc'] = array(
  
    'title' => 'Акт о вскрытии ПК',
    'page callback' => 'foo',
    'access callback' => TRUE,
    'type' => MENU_NORMAL_ITEM,
  
  );
  
  return $items;
}


/* попытка вытащить контент */

function xray_block_view_alter(&$data, $block) {
//     dpm($data);
    return $data;
}

/* */

// $content = xray_block_view_alter($data, $block); // есть ошибка



function foo(){

    
        
    $content = '

    <h2>Акт о вскрытии системного блока</h2>
    
    ';
    
    $n = node_load(array('nid'=>$nid));
    
    
    // Генерация PDF.

  require_once DRUPAL_ROOT . '/sites/all/libraries/mpdf/mpdf60/mpdf.php';
  
  $mpdf = new mPDF('utf-8', 'A4', 0, '', 20, 8, 10, 10, 0, 0);
  $mpdf->WriteHTML($form['#node']->field_act_opening_pc_date['und'][0]['value']);
  $mpdf->Output($pdfheader . '.pdf', 'D');
   
//     return $content;
}

function xray_help($path, $arg) {
//     dpm($arg);
    if ($path == 'admin/structure') {
        return t('This site has stuff!');
    }
}




/**
* Реализуем hook_form_alter().
*/
function xray_form_alter(&$form, &$form_state, $form_id) {
//     debug($form, $form_id, TRUE);
    dpm($form);
//     $form['fields']['field_act_opening_pc_date']['field_name']['#markup'] = t('');

print $form['#node']->field_act_opening_pc_date['und'][0]['value'];
}




/**
* Реализуем hook_help().
*/

/*
function xray_help($path, $arg) {
//     dpm($arg);
    if ($path == 'admin/structure') {
        return t('This site has stuff!');
    }
}

function xray_menu() {
$items['admin/reports/xray'] = array(
'title' => 'X-ray technical site overview',
'description' => 'See the internal structure of this site.',
'page callback' => 'xray_overview_page',
'access callback' => TRUE,
);
$items['admin/reports/xray/overview'] = array(
'title' => 'Overview',
'description' => "Technical overview of the site's internals.",
'type' => MENU_DEFAULT_LOCAL_TASK,
'weight' => -10,
);
return $items;
}

function xray_overview_page(){
    return 'hello';
}

*/

print '<hr>';
print 'here<br>';

node_load();

print '<hr>';


function xray_convert_openpc_to_pdf($act_node, $output_uri) {
    
    
    $meta['no'] = $act_node->field_act_opening_pc_date[LANGUAGE_NONE][0]['value'];
    var_dump($meta);
    
}

function xray_field_info(){
//     dpm();
}


$url_str = $_SERVER['REQUEST_URI'];
$url_item = explode('/', $url_str);
print_r($url_item);

print '<br>';

foreach($url_item as $i){
    var_dump($i);
    $int_value = ctype_digit($i) ? intval($i) : null;
    print_r($int_value);
    if ($int_value === null)
    {
        echo "$value wasn't all numeric" . "<br>";
    }
    else $id = intval($i);
};



$node = node_load($id);
debug($node);

print $node->field_act_opening_pc_date['und'][0]['value'];


/* ok */
/*
$url = $_SERVER['REQUEST_URI'];
echo $url;
*/