<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laravel 5.4 - Angular 2</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>




    <![endif]-->
    <base href="/">
</head>
<body>

    <my-app></my-app>
    <!-- Page Content -->
    





<script src="{{url('')}}/js/core-js/client/shim.min.js"></script>

<script src="{{url('')}}/js/zone.js/dist/zone.js"></script>

<script src="{{url('')}}/js/reflect-metadata/Reflect.js"></script>

<script src="{{url('')}}/js/systemjs/dist/system.src.js"></script>

<script src="{{url('')}}/systemjs.config.js"></script>

<script>
    System.import('app').catch(function(err){ console.error(err); });
</script>

<script src="{{url('style/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('style/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
</body>
</html>