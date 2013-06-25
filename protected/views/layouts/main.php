<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    <div class="l-grid">
        <div class="l-sidebar">
            <img src="/images/logo.png" alt="Excavator Logo" />

            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items'=>array(
                    array(
                        'label' => 'Data',
                        'url'   => array('/site/index')
                    ),
                    array(
                        'label' => 'About',
                        'url'   => array('/site/page', 'view'=>'about')
                    ),
                    array(
                        'label' => 'Legal',
                        'url'   => array('/site/legal')
                    ),
                ),
            ));
            ?>
        </div>

        <div class="l-content">
            <?php echo $content; ?>
        </div>
    </div>
</body>
</html>
