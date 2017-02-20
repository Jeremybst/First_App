<?php

/**
 * For Pots
 */
class Post extends AppModel
{
/**
* Validation des champs
**/
  public $validate = array(
    'title' => array(
      'rule' => 'notBlank'
    ),
    'body' => array(
      'rule' => 'notBlank'
    )
  );
}


 ?>
