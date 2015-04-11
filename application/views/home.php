



Hello Welcome to home!!!
<?php
    if($_SESSION['type'] == 2){
?>
<a href='<?= base_url('test/showtests'); ?>'>take test</a>
    <?php }
else if($_SESSION['type'] == 1){ 
?>
<a href='<?= base_url('test/set_test'); ?>'>set test</a>

<?php
}
?>
<br>
<a href='<?= base_url('index/logout'); ?>'>Log out</a>