<section id="header" class="hidden-xs">
    <img id="header-background" src="<?= base_url().'assets/img/head-background.png'?>">
    <nav class="navbar transparent navbar-inverse navbar-static-top top-menu">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="col-md-offset-3 col-md-2">
                    <ul class="nav navbar-nav float-right">
                        <li class="custom-active"><a href="#">Home</a>
                            <img class="highlight" src="<?= base_url().'assets/img/highlight.png'?>"
                        </li>
                        <li><a href="#">About us</a></li>
                    </ul>
            </div>
            <div class="col-md-2">
                <img id="logo" src="<?= base_url().'assets/img/logo.png'?>" style="">
            </div>
            <div class="col-md-2">
                <ul class="nav navbar-nav">
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="phrase">
        <h1>Fresh Ingredients</h1>
        <h3>FRESH. DELICIOUS. HEALTHY</h3>
        <div class="row">
            <div class="head-button">
                <a href=""  id="menu-button" class="btn btn-default btn-block">VIEW MENU</a>
                <a href="" id="book-button" class="btn btn-default btn-block">BOOK A TABLE</a>
            </div>
        </div>
    </div>
</section>
<div class="col-md-2 col-sm-12 col-xs-12">
    <!-- Navbar toggle MOBILE -->
    <button type="button" style="margin-top:25px" class="navbar-toggle collapsed hidden-lg hidden-md" data-toggle="collapse" data-target="#header_menu_toggler">
        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
        <span class="icon-bar"></span> </button>
</div>
<!-- md-3 --><!-- MObile menu -->
<div class="col-xs-12 col-sm-12 visible-xs visible-sm">
    <div class="collapse navbar-collapse header-menu-mobile" id="header_menu_toggler">
        <ul class="header-menu">
            <?php for($i = 0; $i<(count($navigation)); $i++):?>
                <li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-home menu-item-2">
                    <a href="#<?= $navigation[$i]['navigation_link']?>"><?= $navigation[$i]['navigation_name']?></a>
                </li>
            <?php endfor;?>
        </ul>
    </div>
</div>
