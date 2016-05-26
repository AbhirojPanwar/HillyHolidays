


 <!DOCTYPE html>
<html lang="en">
<head>
  <title>HillyHolidays</title>
<style></style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styling.css">
  <?php
  // define variables and set to empty values

  require_once 'swift/lib/swift_required.php';

  $email= $query = $password = "";
  $emailErr="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

  $password=$_POST["user_sec"];
    if (empty($_POST["query"])) {
    } else {
      $query = test_input($_POST["query"]);
    }

    $mail_check=explode('@',$email);
    $domain=$mail_check[1];
   if($domain=='gmail.com')
   {
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
      ->setUsername($email)
      ->setPassword($password);

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance("Query regarding location")
      ->setFrom(array($email))
      ->setTo(array('abhiroj95@gmail.com'))
      ->setBody($query);

try{

      $result=$mailer->send($message);
      if($result){
        echo "<script type='text/javascript'>
      $(document).ready(function(){
      $('#thankyouModal').modal('show');
      });
      </script>";
  }
      else echo $result;
    }
    catch (Exception $e){
      echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#errorModal').modal('show');
    });
    </script>";
    }

  }

  if($domain=='outlook.com')
  {
    $transport = Swift_SmtpTransport::newInstance('smtp-mail.outlook.com', 587, "tls")
      ->setUsername($email)
      ->setPassword($password);

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance("HH_Query")
      ->setFrom(array($email))
      ->setTo(array('abhiroj96@gmail.com'))
      ->setBody($query);

try{

      $result=$mailer->send($message);
      if($result){
        echo "<script type='text/javascript'>
      $(document).ready(function(){
      $('#thankyouModal').modal('show');
      });
      </script>";
  }
      else echo $result;
    }
    catch (Exception $e){
      echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#errorModal').modal('show');
    });
    </script>";
    }

  }
}

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
<body>
<nav class="navbar navbar-default ">
  <div id="main-header-containers" class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">HillyHolidays</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Tourism</a></li>
        <li><a href="Rishikesh.php">Destinations</a></li>
        <li><a href="#">Sight-Seeing</a></li>
        <li><a href="" id="weather">Weather</a></li>
      </ul>
      <script>
      $(document).ready(function(){
        $('#weather').click(function(e){
          event.preventDefault();
        $('#remove').remove();
        $('#content_here').load("vendor/cmfcmf/openweathermap-php-api/Examples/CurrentWeather.php");

    });
});

      </script>


      <ul class="nav navbar-nav navbar-right">
          <li><a href="#" data-toggle="modal" data-target="#query_modal">Need Help?</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="modal fade" id="query_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
<div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Ask Us
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control"
                        name="email" placeholder="Email" required="required"/>
                    </div>
                    <p><?php echo $emailErr;?></p>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                             name="user_sec" placeholder="Password" required="required"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputName3" >Query</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="query" placeholder="How may we assist you?" required="required"></textarea>
                          </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Send</button>
                    </div>
                  </div>

                </form>

              </div>
              </div>
              </div>
            </div>
            </div>
            <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
              <div class="vertical-alignment-helper">
          <div class="modal-dialog vertical-align-center">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Thanks for getting in touch!
                    </h4>
                </div>
                  <div class="modal-body">
                      <p>We will get back to you soon!!</p>
                  </div>
              </div>
          </div>
        </div>
          </div>
          <div class="modal fade" id="errorModal" tabindex="-1" role="dialog">
            <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close"
                     data-dismiss="modal">
                         <span aria-hidden="true">&times;</span>
                         <span class="sr-only">Close</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                      There is some issue!
                  </h4>
              </div>
                <div class="modal-body">
                    <p>Please try again!</p>
                </div>
            </div>
        </div>
      </div>
        </div>

</body>
</html>
