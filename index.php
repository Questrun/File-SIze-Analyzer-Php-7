<?php
    function calfunc($f)
    {
    #echo "loop\n";
    $file_size=0;
    if(is_file($f))
    {
    #echo $f."is file\n";
    clearstatcache();
    $file_size=filesize($f);
    }
    if(is_dir($f))
    {
    #echo $f."is directory\n";
    $z=scandir($f);
    foreach($z as $r)
    {
     if(($r!=".")&&($r!=".."))
     {
     #echo "running coop on $f/$r \n";
     $dirs=coop($f."/".$r);
     $file_size+=$dirs;
     #echo "file size return\n";
     }
     if(($r==".")||($r==".."))
     {
      clearstatcache();
      $dirs=filesize($f."/".$r);
      $file_size+=$dirs;
     }
    }   
    }
    #echo "final return\n";
    return $file_size;
    }
    $input = 'input file/folder name/path';// File/Directory Name/Path
    ##echo $input."\n";
    $size=calfunc($input);
    ##echo "return success\n";
    echo 'File/Directory: ' . $input . ' => Size: ' . $size;
