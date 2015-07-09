<?php
/**
 * @var $this yii\web\View
 */
?>
<?php $this->beginContent('@backend/views/layouts/common.php'); ?>
     <div class="wrapper wrapper-content">
       <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
                        <?php echo $content ?>
                    </div>
                </div>
            </div>
        </div>
           

	</div>
<?php $this->endContent(); ?>