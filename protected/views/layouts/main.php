<?php
/* @var $this Controller */

$theme_path = Yii::app()->theme->baseUrl;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link rel="stylesheet" media="screen, projection" href="<?php echo $theme_path."/css/screen.css" ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    <div class="l-grid">
        <div class="l-sidebar">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'htmlOptions'=>array(
                    'class'=>'nav'   
                ),
                'items'=>array(
                    array(
                        'label' => 'Data',
                        'url'   => array('/site/index')
                    ),
                    array(
                        'label' => 'Legal',
                        'url'   => array('/site/page', 'view'=>'legal')
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
