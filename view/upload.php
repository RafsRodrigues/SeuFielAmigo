<?php

$allowed = array('png', 'jpg', 'gif','zip','pdf');

    if ( isset($_FILES['file']) && !empty($_FILES['file']['name']) )
    {
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tmp_name = $_FILES['file']['tmp_name'];       

        $destino = 'fotos/';

        echo move_uploaded_file($file_tmp_name,$destino.$file_name);    
    }