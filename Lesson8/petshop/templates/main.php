<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $title; ?></title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway|Roboto">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php include "header.php" ?>
        <div class="container-fluid content">
            <div class="container">                
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-12">
                        <?php include "menu.php"; ?>
                    </div>    
                    <div class="col-lg-9 col-md-7 col-sm-12">
                        <?php include $content; ?>
                    </div>
                </div>    
                <?php include "brands-social-media.php"; ?>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>    
