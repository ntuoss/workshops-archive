<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="description" content="NTUOSS Workshop!"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="static/css/common.css">
        <link rel="stylesheet" type="text/css" href="static/css/index.css">
        
        <script type="text/javascript" src="jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="static/js/index.js"></script>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">NTUOSS</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a target="_blank" href="http://www.ntuoss.com">Home</a>
                        </li>
                        <li>
                            <a target="_blank" href="http://tgifhacks.ntuoss.com">TGIFHacks</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social Networks <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a target="_blank" href="http://www.github.com/ntuoss">Github</a></li>
                                <li class="divider"></li>
                                <li><a target="_blank" href="http://www.facebook.com/ntuoss">Facebook</a></li>
                                <li><a target="_blank" href="http://twitter.com/ntuoss">Twitter</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <h1>Web Development Workshop</h1>
                <p>Basic HTML, CSS, JavaScript, PHP</p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="static/images/ntuoss.png" class="img-responsive" alt="NTUOSS Logo">
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="download.php" method="post" onsubmit="return checkselected()">
                        <fieldset>
                            <legend>Please select materials you want to download:</legend>
                            
                            <label class="checkbox">
                                <input type="checkbox" name="manual" value="true"> Workshop manual
                            </label>
                            <p class="help-block">Workshop manual containing instructions.</p>
                            <label class="checkbox">
                                <input type="checkbox" name="sourcecode" value="true"> Workshop source code
                            </label>
                            <p class="help-block">Workshop source code for your reference.</p>
                            <label class="checkbox">
                                <input type="checkbox" name="bootstrap" value="true"> Bootstrap
                            </label>
                            <p class="help-block">Bootstrap framework for faster and easier web development.</p>
                            <label class="checkbox">
                                <input type="checkbox" name="jquery" value="true"> jQuery
                            </label>
                            <p class="help-block">Javascript framework.</p>
                            <button type="submit" class="btn btn-primary">Download Selected!</button>
                            <button type="button" class="btn btn-success" onclick="selectAll();">Select All!</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>