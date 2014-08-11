<!DOCTYPE html>

<!--
  Gogon 2014. sh.setyana@gmail.com
  go2n.github.io
  this template taken and modified from Bootstrap: Fixed navbar
  http://getbootstrap.com/examples/navbar-fixed-top/ 
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="templates/nboot3/assets/images/favicon.ico">

    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="templates/nboot3/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="templates/nboot3/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="lib/jquery.js"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php"><img src="templates/nboot3/assets/images/logo.png" class="navbar-text logo pull-left" /></a>
          <a class="navbar-brand" href="index.php">Nayanes: SLiMS Search Proxy</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Library <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php
                  foreach($sysconf['node'] as $idx => $node) {
                    echo '<li><a href="'.$node['url'].'" target="_blank">'.$node['desc'].'</a></li>';
                  }
                ?>
              </ul>
            </li>
            <li><a href="index.php?p=about">About Nayanes</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!-- container -->
    <div class="container">
      <!-- simpe search -->
      <form class="well form-horizontal" role="form">
        <div class="form-group">
          <input type="hidden" name="p" value="search" />
          <label class="col-sm-2 control-label"><?php echo __('Keywords');?></label>
          <div class="col-sm-10">
            <input type="text" name="keywords" class="form-control" value="<?php echo isset($_GET['keywords'])?trim($_GET['keywords']):''?>">
          </div>
        </div>
        <div class="form-group">
          <label for="nodes" class="col-sm-2 control-label">Location</label>
          <div class="col-sm-10">
            <select name="node" class="form-control">
              <option value="ALL"><?php echo __('All');?></option>
              <?php
                  foreach($sysconf['node'] as $idx => $node) {
                    echo '<option value="'.$idx.'">'.$node['desc'].'</option>';
                  }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary"><?php echo __('Search now'); ?></button>
            <a data-toggle="modal" data-target="#advSearchModal" class="btn btn-default" ><?php echo __('Advanced search'); ?></a>
          </div>
         </div>
      </form>
      
      <!-- advanced search modal dialog-->
      <div class="modal fade" id="advSearchModal" role="dialog" aria-labelledby="advSearchModal" aria-hidden="true">
      <form id="adv-search-form" class="form-horizontal" role="form" action="index.php" method="get">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4>Nayanes: <?php echo __('Advanced search'); ?></h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="advsearch" value="1" />
              <input type="hidden" name="p" value="search" />
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label"><?php echo __('Title');?></label>
                <div class="col-sm-10">
                  <input type="text" name="title" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo __('Author(s)');?></label>
                <div class="col-sm-10">
                  <input type="text" name="author" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo __('Subject(s)');?></label>
                <div class="col-sm-10">
                  <input type="text" name="subject" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo __('ISBN/ISSN');?></label>
                <div class="col-sm-10">
                  <input type="text" name="isbn" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo __('Location');?></label>
                <div class="col-sm-10">
                  <select name="node" class="form-control">
                    <option value="ALL"><?php echo __('All');?></option>
                    <?php
                        foreach($sysconf['node'] as $idx => $node) {
                          echo '<option value="'.$idx.'">'.$node['desc'].'</option>';
                        }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="search" value="<?php echo __('Search'); ?>" class="btn btn-primary" />
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form>
      </div>
      
      <div id="main-content">
        <?php echo $main_content; ?>
      </div>
      
      
    </div> <!-- /container -->
    
    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <p>&copy Senayan Developer Community</p>
        <p>Template NBoot 3 designed by <a href="http://go2n.github.io" target="_blank">@go2n</a></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="templates/nboot3/assets/js/bootstrap.js"></script>
  </body>
</html>
