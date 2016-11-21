<?php

    function jiecheng($n){
        $s=1;
        for($i=1;$i<=$n;$i++){
            $s*=$i;
        }
        return $s;
    }
    echo jiecheng(5);
?>
