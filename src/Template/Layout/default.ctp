<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore - The website where you can only wish</title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('jquery-3.2.1.min.js'); ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>

    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('css') ?>
    
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="#"><?= $this->fetch('title') ?></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                  
                    <li><?= $this->Html->link(__('Home'), ['controller' => 'home']) ?></li>
                    <li><?= $this->Html->link(__('Products'), ['controller' => 'products']) ?></li>
                    <li><?= $this->Html->link(__('Developers'), ['controller' => 'developers']) ?></li>
                    <li><?= $this->Html->link(__('Users'), ['controller' => 'users']) ?></li>
                    <li><?= $this->Html->link(__('Reviews'), ['controller' => 'reviews']) ?></li>
                    <li><?= $this->Html->link(__('Consoles'), ['controller' => 'consoles']) ?></li>
                    <?php if($loggedUser['isAdmin']) { ?>
                    <li><?= $this->Html->link(__('Files'), ['controller' => 'files']) ?></li>
                    <?php } ?>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    
                        <!-- <li class="dropdown show">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Langages <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li> -->
                    
                    
                    <li><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US']) ?></li>
                    <li><?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA']) ?></li>
                    <li><?= $this->Html->link('Deutsch', ['action' => 'changeLang', 'de_DE']) ?></li>
                    
                    <?php if($loggedUser !== null) { ?>
                    
                    <li><?= $this->Html->link('Logged in as ' . h($loggedUser['username']), ['controller' => 'users', 'action' => 'edit', $loggedUser['id']]) ?></li>
                    <li><?= $this->HTML->Link('Wishlist', ['controller' => 'wishlists']) ?></li>
                    <li id="Logout"><?= $this->Html->link('Logout', ['controller'=>'users', 'action' => 'logout']); ?></li>
                    
                    <?php } else { ?>
                    
                    <li id="Login"><?= $this->Html->link('Login', ['controller'=>'users', 'action' => 'login']); ?></li>
                    <li id="Register"><?= $this->Html->link('Register', ['controller'=>'users', 'action' => 'add']); ?></li>
                    
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
        <div class="sponsor">
            <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=bootswatchcom" id="_carbonads_js"></script>
        </div>
    </footer>
</body>
</html>