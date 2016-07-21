<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo $this->Html->url('/tree_menu/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo $this->Html->url('/tree_menu/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style type="text/css">
            /* Override some defaults */
            html, body {
                background-color: #eee;
            }
            body {
                padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
            }
            .container > footer p {
                text-align: center; /* center align it with the container */
            }
            /*      .container {
                    width: 940px;  downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16.
                  }*/

            /* The white background content wrapper */
            .container > .content {
                background-color: #fff;
                padding: 20px;
                margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
                -webkit-border-radius: 0 0 6px 6px;
                -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
            }

            /* Page header tweaks */
            .content .page-header {
                margin-top: 0px;
            }

            .content .page-header #addnew{
                margin-top: 10px;
            }

            /* Styles you shouldn't keep as they are for displaying this base example only */
            .content .span12,
            .content .span7,
            .content .span5 {
                min-height: 500px;
            }
            /* Give a quick and non-cross-browser friendly divider */
            .content .span5 {
                margin-left: 0;
                padding-left: 19px;
                border-left: 1px solid #eee;
            }

            .topbar .btn {
                border: 0;
            }

        </style>
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo $this->Html->url('/'); ?>">CakePHP Tree Menu Plugin</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">                            
                            
                            <li class="dropdown <?php if (!isset($this->params['named']['alias'])) echo 'active'; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Main Demo <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class=""><a href="<?php echo $this->Html->url('/admin/tree_menu/categories/index'); ?>"><?php echo __('Manage Categories'); ?></a></li>
                                    <li class=""><a href="<?php echo $this->Html->url('/admin/tree_menu/categories/sort'); ?>"><?php echo __('Sort Categories'); ?></a></li>
                                </ul>
                            </li>
                            <li class="dropdown <?php if (isset($this->params['named']['alias'])) echo 'active'; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Demo Re-Use Tree Menu <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class=""><a href="<?php echo $this->Html->url('/admin/tree_menu/categories/index/alias:zoo'); ?>"><?php echo __('Manage Zoo'); ?></a></li>
                                    <li class=""><a href="<?php echo $this->Html->url('/admin/tree_menu/categories/sort/alias:zoo'); ?>"><?php echo __('Sort Zoo'); ?></a></li>
                                </ul>
                            </li>
                            
                            <li class=""><a href="<?php echo $this->Html->url('/tree_menu/categories/index'); ?>"><?php echo __('Demo Generate Multi-level Dropdown'); ?></a></li>
                            
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="span12">
                        <?php if (isset($title)) { ?>
                            <div class="page-header">
                                <div class="row">
                                    <div class="span8">
                                        <h2><?php echo $title; ?> <small><?php if (isset($description)) echo $description; ?></small></h2>
                                    </div>
                                    <div class="span4" style="text-align: right;">
                                        <?php echo $this->Html->link(__('New') . ' ' . $humanizeAlias, array('action' => 'add', 'alias' => $alias), array('class' => 'btn', 'id' => 'addnew')); ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->Session->flash('auth'); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>

        </div> <!-- /container -->
        <div class="container">
            2012 © <a href="mailto:vukhanhtruong@gmail.com">Vu Khanh Truong</a> | All Rights Reserved
        </div>
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo $this->Html->url('/tree_menu/js/bootstrap.min.js'); ?>"></script>
    </body>
</html>
