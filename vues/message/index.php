<?php 
    require_once(ROOT . 'vues/pages/header.php');
?>

<div class="container border mt-4" style='min-height:55vh;max-height:55vh; overflow-Y:scroll;'>
    <?php 
        $mes = $message->get();
    ?>
        
    <div class="d-flex flex-column" id='contents'  style='min-height:100%;max-height:100%;'>
        <?php foreach($mes as $key=>$value): ?>
                <div class="mb-2 rounded my-1 border text-dark rounded border text-light rounded alert">
                    <?=$value['content']?> 
                </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container mb-4">
    <div class="col rounded border mt-4">
        <?php require_once(ROOT . 'vues/message/ajout.php'); ?>
    </div>
</div>

<?php 
    require_once(ROOT . 'vues/pages/footer.php');

?>