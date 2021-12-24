<?php
    // celle si contiendras tout  les ajout que je vais faire ...
    $post_data = filter_input_array(INPUT_POST);
    $infos = [];
    if(isset($_GET['message']) && isset($post_data['content']))
    {
        if($message->add($post_data) == true) echo json_encode($message->recherche(['conditions'=>'id=last_insert_id()']));
    }
?>