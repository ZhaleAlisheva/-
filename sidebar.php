<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="img/user.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
        <!-- EDIT THIS ONE LATER -->
            <div class="profile-usertitle-name"><?php echo 'Zhale';?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Администратор</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
    <?php
        if (isset($_GET['данни'])){ ?>
            <li class="active">
                <a href="index.php?dashboard"><em class="fa fa-dashboard">&nbsp;</em>
                    Данни
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?dashboard"><em class="fa fa-dashboard">&nbsp;</em>
                    Данни
                </a>
            </li>
			 <?php }
        if (isset($_GET['карта'])){ ?>
            <li class="active">
            <a href="index.php?map"><em class="fa fa-calendar">&nbsp;</em>
                    Почивни карти
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?map"><em class="fa fa-calendar">&nbsp;</em>
                    Почивни карти
                </a>
            </li>
        <?php }
        if (isset($_GET['резервации'])){ ?>
            <li class="active">
            <a href="index.php?reservation"><em class="fa fa-calendar">&nbsp;</em>
                    Резервации
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?reservation"><em class="fa fa-calendar">&nbsp;</em>
                    Резервации
                </a>
            </li>
			 <?php }
        if (isset($_GET['регистър'])){ ?>
            <li class="active">
            <a href="index.php?register"><em class="fa fa-calendar">&nbsp;</em>
                    Регистър
                </a>
            </li>
        
            <li>
            <a href="index.php?register"><em class="fa fa-calendar">&nbsp;</em>
                    Регистър
                </a>
            </li>
			 <?php }
        if (isset($_GET['справка'])){ ?>
            <li class="active">
                <a href="index.php?staff_mang"><em class="fa fa-users">&nbsp;</em>
                    Справка
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?staff_mang"><em class="fa fa-users">&nbsp;</em>
                    Справка
                </a>
            </li>
        <?php }
        if (isset($_GET['опис'])){ ?>
            <li class="active">
                <a href="index.php?room_mang"><em class="fa fa-bed">&nbsp;</em>
                    Опис бунгала
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?room_mang"><em class="fa fa-bed">&nbsp;</em>
                    Опис бунгала
                </a>
            </li>
			 <?php }
        if (isset($_GET['ценоразпис'])){ ?>
            <li class="active">
            <a href="index.php?price"><em class="fa fa-calendar">&nbsp;</em>
                    Ценоразпис
                </a>
            </li>
        <?php } else{?>
            <li>
            <a href="index.php?price"><em class="fa fa-calendar">&nbsp;</em>
                    Ценоразпис
                </a>
            </li>
        <?php }
        if (isset($_GET['дата'])){ ?>
            <li class="active">
                <a href="index.php?smeni"><em class="fa fa-users">&nbsp;</em>
                    Смени
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?smeni"><em class="fa fa-users">&nbsp;</em>
                    Смени
                </a>
            </li>
            <?php
        if (isset($_GET['статистика'])){ ?>
            <li class="active">
                <a href="index.php?statistics"><em class="fa fa-pie-chart">&nbsp;</em>
                    Архив
                </a>
            </li>
        <?php } else{?>
        <li>
            <a href="index.php?statistics"><em class="fa fa-pie-chart">&nbsp;</em>
               Архив
            </a>
        </li>
<?php }?>
     <?php
        if (isset($_GET['статистика'])){ ?>
            <li class="active">
                <a href="index.php?statistics"><em class="fa fa-pie-chart">&nbsp;</em>
                    Акаунти
                </a>
            </li>
        <?php } else{?>
        <li>
            <a href="index.php?statistics"><em class="fa fa-pie-chart">&nbsp;</em>
               Акаунти
            </a>
        </li>
<?php }?>
        <?php }
        if (isset($_GET['настройки'])){ ?>
            <li class="active">
                <a href="index.php?system_settings"><em class="fa fa-comments">&nbsp;</em>
                   Настройки акаунт
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?system_settings"><em class="fa fa-comments">&nbsp;</em>
                     Настройки акаунт
                </a>
            </li>
        <?php }
        ?>

       


    </ul>
</div><!--/.sidebar-->