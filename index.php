<?php

require_once('script.php');

$test = new dataSync();
$dpri = $test->group1;

// Set filepath of log files.
$test->setPath('logs/');
$page = $_SERVER['PHP_SELF'];
header("Refresh: 5; url=$page");


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css/custom.css"> -->
    <!-- Font Awesome -->
    <script defer src="vendor/fontawesome/js/all.min.js"></script>

    <title>Log Sync Monitoring</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 my-5">
                <h1 class="display-3 text-center">Log Sync Monitoring</h1>
            </div>
        </div>
        <div class="row">
            <h4 id="waktu" class="pl-3 py-3 text-left"></h4>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Directory</th>
                            <th class="text-center">Jakarta</th>
                            <th class="text-center">Bali</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1">
                            <td><i class="fa fa-plus" aria-hidden="true"></i> DPRI</td>
                            <td class="text-center">-</td>
                            <td class="text-center">-</td>  
                            <td class="text-center">-</td>
                        </tr>
                    </tbody>
                    <tbody id="group-of-rows-1" class="collapse">
                        <?php

                            foreach ($dpri as $value) {
                                echo '<tr>
                                        <td>- ' . $value . '</td>
                                        <td class="text-center">' . $test->getValue("JKT","DPRI".$value) . '</td>
                                        <td class="text-center"> ' . $test->getValue("BLI","DPRI".$value) . '</td>
                                        ' . $test->getSyncStatus("DPRI".$value) . '
                                    </tr>';
                            }
                        ?>
                    </tbody>
                    <tbody>
                        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-2" aria-expanded="false" aria-controls="group-of-rows-2">
                            <td><i class="fa fa-plus" aria-hidden="true"></i> VISA</td>
                            <td class="text-center">-</td>
                            <td class="text-center">-</td>  
                            <td class="text-center">-</td>
                        </tr>
                    </tbody>
                    <tbody id="group-of-rows-2" class="collapse">
                        <?php
                            echo '<tr>
                                        <td>- BIO</td>
                                        <td class="text-center">' . $test->getValue("JKT","VISABIO") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","VISABIO") . '</td>
                                        ' . $test->getSyncStatus("VISABIO") . '
                                    </tr>';

                            echo '<tr>
                                        <td>- DOCS</td>
                                        <td class="text-center">' . $test->getValue("JKT","VISADOCS") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","VISADOCS") . '</td>
                                        ' . $test->getSyncStatus("VISADOCS") . '
                                    </tr>';
                        ?>
                    </tbody>
                    <tbody>
                        <?php
                            echo '<tr>
                                        <td> CEKAL</td>
                                        <td class="text-center">' . $test->getValue("JKT","CEKAL") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","CEKAL") . '</td>
                                        ' . $test->getSyncStatus("CEKAL") . '
                                    </tr>';
                        ?>
                    </tbody>
                    <tbody>
                        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-3" aria-expanded="false" aria-controls="group-of-rows-3">
                            <td><i class="fa fa-plus" aria-hidden="true"></i> IZIN TINGGAL</td>
                            <td class="text-center">-</td>
                            <td class="text-center">-</td>  
                            <td class="text-center">-</td>
                        </tr>
                    </tbody>
                    <tbody id="group-of-rows-3" class="collapse">
                        <?php
                            echo '<tr>
                                        <td>- BIO</td>
                                        <td class="text-center">' . $test->getValue("JKT","IZTIBIO") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","IZTIBIO") . '</td>
                                        ' . $test->getSyncStatus("IZTIBIO") . '
                                    </tr>';

                            echo '<tr>
                                        <td>- DOCS</td>
                                        <td class="text-center">' . $test->getValue("JKT","IZTIDOCS") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","IZTIDOCS") . '</td>
                                        ' . $test->getSyncStatus("IZTIDOCS") . '
                                    </tr>';
                        ?>
                    </tbody>
                    <tbody>
                        <?php
                            echo '<tr>
                                        <td> DETENI</td>
                                        <td class="text-center">' . $test->getValue("JKT","DETENI") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","DETENI") . '</td>
                                        ' . $test->getSyncStatus("DETENI") . '
                                    </tr>';
                        ?>
                    </tbody>
                    <tbody>
                        <?php
                            echo '<tr>
                                        <td> MOBILE</td>
                                        <td class="text-center">' . $test->getValue("JKT","MOBILE") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","MOBILE") . '</td>
                                        ' . $test->getSyncStatus("MOBILE") . '
                                    </tr>';
                        ?>
                    </tbody>
                    <tbody>
                        <?php
                            echo '<tr>
                                        <td> NYIDDAKIM</td>
                                        <td class="text-center">' . $test->getValue("JKT","NYIDDAKIM") . '</td>
                                        <td class="text-center">' . $test->getValue("BLI","NYIDDAKIM") . '</td>
                                        ' . $test->getSyncStatus("NYIDDAKIM") . '
                                    </tr>';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/js/jquery-3.4.1.slim.min.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/moment.js"></script>
    <script type="text/javascript">
        document.getElementById('waktu').innerHTML = moment().format('LLLL');
    </script>
  </body>
</html>