<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Lonely Planet</title>
    <link href="static/all.css" media="screen" rel="stylesheet" type="text/css">
  </head>

  <body>
    <div id="container">
      <div id="header">
        <div id="logo"></div>
        <h1>Lonely Planet: <?php echo $title ?></h1>
      </div>

      <div id="wrapper">
        <div id="sidebar">
          <div class="block">
            <h3>Navigation</h3>
            <div class="content">
              <div class="inner">
                <?php // Primary Nav ?>
              </div>
            </div>
          </div>
        </div>

        <div id="main">
          <div class="block">
            <div class="secondary-navigation">
              <?php // Secondary Nav ?>
              <div class="clear"></div>
            </div>
            <div class="content">
              <div class="inner">
          		  <?php // Content ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
