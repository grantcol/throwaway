<?php 
include "php/funcs.php";

//get the word from the GET params 
$word = $_GET["word"];
//stub for getRequestResp($word);
$req = buildRequest( $word );
$response = execRequest( $req );
$xml = new SimpleXMLElement($response);
//var_dump($xml);
$docs = array();
foreach($xml->document as $d)
{
  $cont = $d->abstract;
  $doc = new Document("path", "a", "d", $cont, "url");
  $docs[] = $doc;
}
//$td = getTestDocuments($word);
//var_dump($docs);

$dc = cluster($docs);
echo "SOME";
$cloud = $getWordCloud($dc);
echo "d ".$cloud;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">
    <link rel='stylesheet' href='../css/nprogress.css'/>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    ul { 
      list-style-type: none; 
      list-style-image: none; 
    } 
    li{
      text-decoration: none;
      text-align: left;
    }
    </style>
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="https://github.com/grantcol/ResearchCluster">About</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Research Team 8</h3>
      </div>

      <div id="word_cloud">
      <?php echo $cloud ?>
      </div>

      <footer class="footer">
        <p>&copy; CS310 Team 8, Spring 2015</p>
      </footer>

    </div> <!-- /container -->
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <script src='../js/nprogress.js'></script>
    <script type="text/javascript">
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
