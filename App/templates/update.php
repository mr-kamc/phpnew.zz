<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <?php if(isset($errors)): ?>
        <?php foreach($errors as $el):; ?>
            <div class = "alert alert-danger">
                <?php echo $el->getMessage(); ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <header><h1>Hello, world!</h1></header>
    <nav>
        <p><a href="/">На главную</a></p>
        <p><a href="/Admin/Index">Админка</a></p>
    </nav>
    <form action="/Admin/Save" method="POST">
        <div class="row">
            <?php if (!empty($article->id)): ?>
                <input type="hidden" name="id" value= <?php echo $article->id; ?>>
                <div class="col-xs-3">
                <textarea rows="6" class="form-control" name="name"><?php
                    if (!empty($article->name)) {
                        echo $article->name;
                    }
                    ?>
                    </textarea>
                </div>
                <div class="col-xs-6">
                    <textarea rows="6" class="form-control" name="text"><?php
                        if (!empty($article->text)) {
                            echo $article->text;
                        }
                        ?>
                    </textarea>
                </div>

            <?php else: ?>
                <div class="col-xs-3">
                    <textarea rows="6" class="form-control" name="name"></textarea>
                </div>
                <div class="col-xs-6">
                    <textarea rows="6" class="form-control" name="text""></textarea>
                </div>
            <?php endif; ?>
            <input type="submit" class = "btn btn-success btn-md">
        </div>
    </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>