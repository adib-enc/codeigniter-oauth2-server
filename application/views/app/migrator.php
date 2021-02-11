<ol>
<?php
foreach($migrator as $m){
    $url = base_url($m);
?>
    <li>
        <a href=" <?= $url ?>"><?= $url ?></a>
    </li>
<?php
}
?>
</ol>