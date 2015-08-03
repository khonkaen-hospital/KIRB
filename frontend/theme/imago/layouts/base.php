<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<div id="container">
<!-- Header
            ================================================== -->
        <header class="clearfix">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html">K<span>IRB</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                      <?php echo Nav::widget([
                            'options' => ['class' => 'nav navbar-nav navbar-right navigate-section'],
                            'items' => [
                                ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
                                [
                                            'label' => Yii::t('frontend', 'Research'),
                                            'url' => ['research/index'],
                                            'visible'=>!Yii::$app->user->isGuest
                                ],
                                // ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                                ['label' => Yii::t('frontend', 'News'), 'url' => ['/article/index']],
                                ['label' => Yii::t('frontend', 'Contact'), 'url' => '#contact-section'],
                                ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
                                ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],

                                [
                                            'label' => Yii::t('frontend', 'Logout'),
                                            'url' => ['/user/sign-in/logout'],
                                            'linkOptions' => ['data-method' => 'post'],
                                            'visible'=>!Yii::$app->user->isGuest
                                ]
                                // [
                                //     'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                                //     'visible'=>!Yii::$app->user->isGuest,
                                //     'items'=>[
                                //         [
                                //             'label' => Yii::t('frontend', 'Settings'),
                                //             'url' => ['/user/default/index']
                                //         ],
                                //         [
                                //             'label' => Yii::t('frontend', 'Backend'),
                                //             'url' => Yii::getAlias('@backendUrl'),
                                //             'visible'=>Yii::$app->user->can('manager')
                                //         ],
                                //         [
                                //             'label' => Yii::t('frontend', 'Logout'),
                                //             'url' => ['/user/sign-in/logout'],
                                //             'linkOptions' => ['data-method' => 'post']
                                //         ]
                                //     ]
                                // ],
                                // ,
                                // [
                                //     'label'=>Yii::t('frontend', 'Language'),
                                //     'items'=>array_map(function ($code) {
                                //         return [
                                //             'label' => Yii::$app->params['availableLocales'][$code],
                                //             'url' => ['/site/set-locale', 'locale'=>$code],
                                //             'active' => Yii::$app->language === $code
                                //         ];
                                //     }, array_keys(Yii::$app->params['availableLocales']))
                                // ]
                            ]
                        ]); ?>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <!-- End Header -->

    <?php echo $content ?>

    <footer>
            <div class="container">
                <h2>Social Media</h2>
                <ul class="social-list">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
                <p class="copyright">
                    &copy; IRB <?php echo date('Y') ?>. <?php echo Yii::powered() ?>
                </p>
            </div>
        </footer>
</div>
<?php $this->endContent() ?>
