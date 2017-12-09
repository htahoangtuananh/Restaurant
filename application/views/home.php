<section id="header" class="">
    <div class="row">
        <img id="header-background" src="<?= base_url().'assets/img/head-background.png'?>">
        <div class="desktop hidden-xs hidden-sm">
            <nav class="navbar transparent navbar-inverse navbar-static-top top-menu ">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="col-md-offset-2 col-md-3 col-sm-4">
                            <ul class="nav navbar-nav float-right">
                                <li class="custom-active"><a href="#">Home</a>
                                    <img class="highlight" src="<?= base_url().'assets/img/highlight.png'?>"
                                </li>
                                <li><a href="#">About us</a></li>
                            </ul>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <img id="logo" src="<?= base_url().'assets/img/logo.png'?>" style="">
                    </div>
                    <div class="col-md-3 col-sm-4">
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
        </div>
    </div>
</section>
<div class="row">
    <div class="navbar navbar-inverse navbar-fixed-top hidden-md hidden-lg">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php for($i = 0; $i<(count($navigation)); $i++):?>
                        <li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-home menu-item-2">
                            <a href="#<?= $navigation[$i]['navigation_link']?>"><?= $navigation[$i]['navigation_name']?></a>
                        </li>
                    <?php endfor;?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<section id="body">
    <div class="row">
        <div class="col-md-3 hidden-sm hidden-xs">
            <img class="welcome-img" src="<?= base_url().'assets/img/welcome-left.png'?>">
        </div>
        <div class="col-md-6 col-xs-12 welcome-text">
            <div class="row">
                <h1>WELCOME</h1>
            </div>
            <div class="row">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper dolor leo. Suspendisse potenti.
                    Quisque sit amet neque vitae est bibendum dapibus facilisis quis mauris. Duis ut arcu consectetur,
                    viverra est et, lobortis dui. Curabitur ac pellentesque nisl. Quisque pharetra lacus tortor, non
                    eleifend ligula lacinia ac. Fusce malesuada finibus nisl. </p>
            </div>
        </div>
        <div class="col-md-3 hidden-sm hidden-xs">
            <img class="welcome-img float-right" src="<?= base_url().'assets/img/welcome-right.png'?>">
        </div>
    </div>
</section>
<section id="menu">
    <div class="row">
        <div class="col-md-3 hidden-sm hidden-xs no-padding">
            <img class="menu-img" src="<?= base_url().'assets/img/menu-left.png'?>">
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="row menu-text intro-menu">
                <div class="col-md-offset-1 col-md-3 hr-menu">
                    <hr>
                </div>
                <div class="col-md-4">
                    <h1>MENU</h1>
                </div>
                <div class="col-md-3 hr-menu">
                    <hr>
                </div>
            </div>
            <div class="row menu-text intro-menu">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper dolor leo. Suspendisse potenti.
                    Quisque sit amet neque vitae est bibendum dapibus facilisis quis mauris. Duis ut arcu consectetur,
                    viverra est et, lobortis dui. Curabitur ac pellentesque nisl. Quisque pharetra lacus tortor, non
                    eleifend ligula lacinia ac. Fusce malesuada finibus nisl. </p>
            </div>
            <div class="row intro-menu-icon">
                <ul class="nav nav-pills">
                    <li class="active col-md-offset-2 menu-li"><a data-toggle="pill" href="#breakfast" data-pill="breakfast"><img class="menu-img-icon" src="<?= base_url().'assets/img/icon/breakfast.png'?>"></a></li>
                    <li class="menu-li"><a data-toggle="pill" href="#dinner" data-pill="dinner"><img class="menu-img-icon" src="<?= base_url().'assets/img/icon/dinner.png'?>"></a></li>
                    <li class="menu-li"><a data-toggle="pill" href="#dessert" data-pill="dessert"><img class="menu-img-icon" src="<?= base_url().'assets/img/icon/dessert.png'?>"></a></li>
                    <li class="menu-li"><a data-toggle="pill" href="#drink" data-pill="drink"><img class="menu-img-icon" src="<?= base_url().'assets/img/icon/drink.png'?>"></a></li>
                </ul>
            </div>
            <div class="tab-content" >
                <!-- TAB Breakfast -->
                <div id="breakfast" class="tab-pane fade in active">
                    <div class="row menu">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Antioxidant Fruits Mix</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Antioxidant Fruits Mix</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row menu">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Antioxidant Fruits Mix</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Antioxidant Fruits Mix</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TAB DINNER -->
                <div id="dinner" class="tab-pane fade in">
                    <div class="row menu">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Creamy smoked salmon, leek</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Creamy smoked salmon, leek</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row menu">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Creamy smoked salmon, leek</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-10 col-xs-9">
                                    <h4>Creamy smoked salmon, leek</h4>
                                </div>
                                <div class="col-md-2 col-xs-3 price">
                                    <h4>$12</h4>
                                </div>
                            </div>
                            <hr class="hr-dotted" style="border-top: dotted 1px;" />
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Candied salmon, basil potato puree, baby kale marsala eggplant confit & balsamic butter sauce.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 hidden-sm hidden-xs no-padding">
            <img class="menu-img float-right" src="<?= base_url().'assets/img/menu-right.png'?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12 col-md-offset-3">
            <div class="row menu-text intro-menu">
                <div class="col-md-offset-1 col-md-3 hr-menu">
                    <hr>
                </div>
                <div class="col-md-4">
                    <h1>GALLERY</h1>
                </div>
                <div class="col-md-3 hr-menu">
                    <hr>
                </div>
            </div>
            <div class="row menu-text intro-menu">
                <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper dolor leo. Suspendisse potenti.
                    Quisque sit amet neque vitae est bibendum dapibus facilisis quis mauris. "</p>
            </div>
            <div class="row intro-menu-icon">
                <div class="col-md-offset-2 col-md-2 col-xs-3">
                    <h4>ALL</h4>
                </div>
                <div class="col-md-2 col-xs-3">
                    <h4>DECOR</h4>
                </div>
                <div class="col-md-2 col-xs-3">
                    <h4>FOOD</h4>
                </div>
                <div class="col-md-2 col-xs-3">
                    <h4>MATERIAL</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.menu-li').click(function () {
        var category = $(this).find('a').attr('data-pill');

            switch(category){
                case 'breakfast':
                    $(this).find('img').attr('src','<?= base_url()."assets/img/icon/breakfast-active.png"?>');
                    break;
                case 'dinner':
                    $(this).find('img').attr('src','<?= base_url()."assets/img/icon/dinner-active.png"?>');
                    break;
                case 'dessert':
                    $(this).find('img').attr('src','<?= base_url()."assets/img/icon/dessert-active.png"?>');
                    break;
                case 'drink':
                    $(this).find('img').attr('src','<?= base_url()."assets/img/icon/drink-active.png"?>');
                    break;
            }
    })
</script>