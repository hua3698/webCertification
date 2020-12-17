<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px">
    <?php
    $ads=$Ad->all(['sh'=>1]);
    $str="";
    foreach ($ads as $ad) {
        $str= $str.$ad['text']."&nbsp;&nbsp;&nbsp;";
        echo $str;
    }
    ?>

</marquee>