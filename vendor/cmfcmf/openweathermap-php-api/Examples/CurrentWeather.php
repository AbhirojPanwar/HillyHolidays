<?php include __DIR__.'/../../../../header.php';
?>
<?php



/**
 * OpenWeatherMap-PHP-API — A php api to parse weather data from http://www.OpenWeatherMap.org .
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following links to read about the usage policies and the license of
 * OpenWeatherMap before using this class:
 *
 * @see http://www.OpenWeatherMap.org
 * @see http://www.OpenWeatherMap.org/terms
 * @see http://openweathermap.org/appid
 */
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once __DIR__ . '/bootstrap.php';

// Language of data (try your own language here!):
$lang = 'en';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'metric';

// Get OpenWeatherMap object. Don't use caching (take a look into Example_Cache.php to see how it works).
$owm = new OpenWeatherMap();
$owm->setApiKey($myApiKey);
?>
<html>
<style>
.navbar {
    margin-bottom: 0;
    background-color: white;
    z-index: 9999;
    border: 0;
    font-size: 14px !important;
    line-height: 10 !important;
    letter-spacing: 2px;
    border-radius: 0;

}

.carousel-inner{
  width: 100%;
  max-height: 480px !important;
}

.navbar li a, .navbar .navbar-brand {
    color: rgb(97, 28, 18) !important;
    transition: all 200ms ease-out 0s;
}

.navbar-brand{
 padding:15px 0!important;
 font-size: 25px !important;
 margin-right: 35px !important;
 font-family: Gill Sans Extrabold, sans-serif;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: white !important;
    background-color: rgb(97, 28, 18) !important;
     letter-spacing: 4px;
     font-size: 15px;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}

.breadcrumb{
  background-color: inherit;
  margin-bottom: 0 !important;
}

.page-content {
    float: left;
    margin: 0;
    padding: 0;
    width: 100%;
}
p{
color:#666;
font-size:18px/16px "Droid sans-serif",Arial-Helvetica;
font-weight:300 !important;
}



.custoa{
  font-family: Arial !important;
  text-decoration: none !important;
  color:rgb(54, 51, 51) !important;
}
.hr{
  border-top: 1px dashed #ccc;
  margin-top: 5px;
}

.hr-solid{
  border-top: 1px solid #ccc;
  margin-top: 15px;
  margin-bottom: 5px;
  opacity:0.4;
}

.vertical-alignment-helper {
    display:table;
    height: 100%;
    width: auto;
    margin: 0 auto;
}
.vertical-align-center {
    /* To center vertically */
    display: table-cell;
    vertical-align: middle;
}

.custoa:hover{
  text-decoration: none !important;
color: rgb(62, 133, 103)!important;
}
.text{
font-size: 22px;
letter-spacing: normal;
font-family: "Droid sans-serif",sans-serif;
padding:5px;
font-weight: 300;
padding-top:0 !important;
opacity:0.9;
}

.text-header{
font-size: 28px;
letter-spacing: normal;
font-family: "Helvetica Neue",Arial;
padding:5px;
font-weight: bolder;
padding-top:0 !important;
}


.text-strong{
font-size: 24px;
letter-spacing: normal;
font-family: "Helvetica Neue",sans-serif;
padding:5px;
font-weight: 300;
padding-top:0 !important;
}

.holloweffect{
  color: rgb(97, 28, 18);
}

.text-mid{
  font-size: 16px;
  letter-spacing: normal;
  font-family: "Droid sans-serif",sans-serif;
  padding:5px;
  font-weight: 200;
  padding-top:0 !important;
  opacity: 0.9;
}

.text-mid-small{
  font-size: 14px;
  letter-spacing: normal;
  font-family: "Droid sans-serif",sans-serif;
  padding:5px;
  font-weight: 200;
  padding-top:0 !important;
  opacity: 0.9;
}

.text-mid-strong{
  font-size: 19px;
  letter-spacing: normal;
  font-family: "Helvetica Neue",sans-serif;
  padding:5px;
  font-weight: 300;
  padding-top:0 !important;
  opacity: 0.9;
}


.text-light{
  font-size: 15px;
  letter-spacing: normal;
  font-family: "Droid sans-serif",sans-serif;
  padding:15px 15px 15px 0  ;
  color:rgb(158, 150, 154);
}

.btn{
  font-weight: lighter !important;
  letter-spacing: 1px;
  font-size: 13px;
}
.onHover{
  font-size: 18px !important;
  color:rgb(54, 51, 51) !important;
  transition: all 400ms ease-out 0s;
}

.onHover:hover,.onHover:active{
  color: rgb(195, 169, 30)!important;
  font-size: 20px !important;
}

.cust-list
{
  border-top:1px dashed rgb(208, 217, 218);
}

.breadcrumb > li + li:before {
  padding: 0 5px;
  color: #ccc;
  content: ">>\00a0";
}

custa{
  text-decoration: none;
}
.cust-hr {
  margin-top:15px !important;
  margin-bottom: 20px !important;
  border: 0;
  border-top: 1px solid rgba(72, 110, 111, 0.4);
}




.container_rem_padding{
    padding-right: 0 !important;
    padding-left:0 !important;
    margin-right: 0 !important;
    margin-left: 0 !important;
}

.carousel{
    border:1px solid #2f9bdz;
    border-radius: 0;
}
.no-padding{
    padding:0 !important;
    margin:0 !important;
}

</style>
<body style="background-color:rgb(97, 28, 18);">
  <div class="well" style="width:90%;margin:0 auto;margin-top:10px;alignment:center-block;background-color:rgb(255, 255, 255) !important;">
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Current Weather</a></li>
  </ol>
  <div class="container-fluid">
    <h4><?php
    try{
      $weather = $owm->getWeather('Rishikesh', $units, $lang);
    }
    catch (OWMException $e) {
      echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
      echo "<br />\n";
    } catch (\Exception $e) {
      echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
      echo "<br />\n";}
      $timestamp=strtotime($weather->lastUpdate->format('r'));
      date_default_timezone_set("Asia/Calcutta");

    echo "Last Update: " . date("l jS \of F Y h:i:s A",$timestamp) ; ?></h4>
<div class="row" style="margin-top:0 !important">   <div class="text-strong">Rishikesh</div>
<div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
   <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
   <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
   <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
  </div>
  <div class="hr"></div>
  <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Auli</div>
  <?php
  try{
  $weather = $owm->getWeather('Auli,IN', $units, $lang);
  }
  catch (OWMException $e) {
      echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
      echo "<br />\n";
  } catch (\Exception $e) {
      echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
      echo "<br />\n";}
  ?>
  <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
     <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
     <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
     <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
    </div>
    <div class="hr"></div>
    <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Haridwar</div>
    <?php
    try{
    $weather = $owm->getWeather('Haridwar', $units, $lang);
    }
    catch (OWMException $e) {
        echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
        echo "<br />\n";
    } catch (\Exception $e) {
        echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
        echo "<br />\n";}
    ?>
    <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
       <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
       <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
       <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
      </div>
      <div class="hr"></div>
      <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Badrinath</div>
      <?php
      try{
      $weather = $owm->getWeather('Badrinath', $units, $lang);
      }
      catch (OWMException $e) {
          echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
          echo "<br />\n";
      } catch (\Exception $e) {
          echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
          echo "<br />\n";}
      ?>
      <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
         <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
         <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
         <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
        </div>
        <div class="hr"></div>
        <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Kedarnath</div>
        <?php
        try{
        $weather = $owm->getWeather('Kedarnath', $units, $lang);
        }
        catch (OWMException $e) {
            echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
            echo "<br />\n";
        } catch (\Exception $e) {
            echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
            echo "<br />\n";}
        ?>
        <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
           <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
           <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
           <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
          </div>
          <div class="hr"></div>
          <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Hem Kund Sahib</div>
          <?php
          try{
          $weather = $owm->getWeather('Joshimath', $units, $lang);
          }
          catch (OWMException $e) {
              echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
              echo "<br />\n";
          } catch (\Exception $e) {
              echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
              echo "<br />\n";}
          ?>
          <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
             <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
             <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
             <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
            </div>
            <div class="hr"></div>
            <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Mussorie</div>
            <?php
            try{
            $weather = $owm->getWeather('Mussorie', $units, $lang);
            }
            catch (OWMException $e) {
                echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                echo "<br />\n";
            } catch (\Exception $e) {
                echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                echo "<br />\n";}
            ?>
            <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
               <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
               <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
               <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
              </div>
              <div class="hr"></div>
              <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Nainital</div>
              <?php
              try{
              $weather = $owm->getWeather('Nainital', $units, $lang);
              }
              catch (OWMException $e) {
                  echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                  echo "<br />\n";
              } catch (\Exception $e) {
                  echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                  echo "<br />\n";}
              ?>
              <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
                 <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
                 <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
                 <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
                </div>
                <div class="hr"></div>
                <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Dehradun</div>
                <?php
                try{
                $weather = $owm->getWeather('Dehradun', $units, $lang);
                }
                catch (OWMException $e) {
                    echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                    echo "<br />\n";
                } catch (\Exception $e) {
                    echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                    echo "<br />\n";}
                ?>
                <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
                   <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
                   <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
                   <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
                  </div>
                  <div class="hr-solid"></div>
                  <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Gangotri</div>
                  <?php
                  try{
                  $weather = $owm->getWeather('Gangotri', $units, $lang);
                  }
                  catch (OWMException $e) {
                      echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                      echo "<br />\n";
                  } catch (\Exception $e) {
                      echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                      echo "<br />\n";}
                  ?>
                  <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
                     <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
                     <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
                     <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
                    </div>
                    <div class="hr-solid"></div>
                    <div class="row" style="margin-top:0 !important;padding:-left:20px!important;padding:-right:20px!important;">   <div class="text-strong">Yamunotri</div>
                    <?php
                    try{
                    $weather = $owm->getWeather('yamuntori', $units, $lang);
                    }
                    catch (OWMException $e) {
                        echo 'OpenWeatherMap exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                        echo "<br />\n";
                    } catch (\Exception $e) {
                        echo 'General exception: '.$e->getMessage().' (Code '.$e->getCode().').';
                        echo "<br />\n";}
                    ?>
                    <div class="text-mid"><?php echo 'Country: '.$weather->city->country; ?></div>
                       <div class="text-mid"><?php echo 'Current: '.$weather->temperature->now; ?></div>
                       <div class="text-mid"><?php echo 'Humidity: '.$weather->humidity; ?></div>
                       <div class="text-mid"><?php echo 'Forecast: '.$weather->weather ?></div>
                      </div>

</div>
</body>
</html>
