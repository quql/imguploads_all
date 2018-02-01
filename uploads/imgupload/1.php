<?php
   $file = $_POST;
   file_put_contents('./1.txt',$file,FILE_APPEND);
   $info['state']='1';
   $info['path']='./uploads';
   echo json_encode($info);