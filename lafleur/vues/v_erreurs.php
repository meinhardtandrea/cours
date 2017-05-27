<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">
    <div class="w3-container">
        <div class="w3-panel w3-pink">
            <?php
            foreach( $msgErreurs as $erreur) { ?>     
                <h4 class="w3-opacity"><?php echo $erreur; ?></h4> 
            <?php } ?>
        </div>
    </div>
</div>
