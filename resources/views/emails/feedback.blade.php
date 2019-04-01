<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Feedback Turno</title>
    <link href="/img/logo-sat.png" rel="shortcut icon">
    <link rel="stylesheet" href="/css/mail.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
</head>

<body>
    <!--<div class="content-logos">
        <img class="logo-sist" src="http://ingsistemas.ufps.edu.co/rsc/img/logo_vertical_ingsistemas_ht180.png" alt="">
        <img class="logo-ufps" src="https://ww2.ufps.edu.co/public/archivos/elementos_corporativos/logo-horizontal.jpg" alt="">
    </div>-->
    <div class="content-sat">
        <div class="circle">
            <div class="content-logo-sat">
                <img class="logo img-responsive" src="/img/logo-sat.png" alt="Logo" />
                <label class="logo-title">SAT</label>
            </div>
        </div>

        <div class="content-words">
            Gracias por utilizar SAT
        </div>

    </div>
    <div class="content-qualification">

        <div class="col-xs-12 col-sm-12 col-md-12 title-feedback" >
            <h3>Por favor califica nuestro servicio</h3>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="clasificacion">
                <input id="radio1" type="radio" name="estrellas" value="5">
                <label class="star" for="radio1">★</label>
                <input id="radio2" type="radio" name="estrellas" value="4">
                <label class="star" for="radio2">★</label>
                <input id="radio3" type="radio" name="estrellas" value="3">
                <label class="star" for="radio3">★</label>
                <input id="radio4" type="radio" name="estrellas" value="2">
                <label class="star" for="radio4">★</label>
                <input id="radio5" type="radio" name="estrellas" value="1">
                <label class="star" for="radio5">★</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="feedback">
                <div class="form-group">
                    <textarea id="texto" style="font-size:1.2em" class="form-control" rows="5" cols="" placeholder="Feedback"></textarea>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <button type="button" id="send" class="btn btn-success btn-lg btn-block">Enviar</button>
            </div>
        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="/js/feedback/feedback.controller.js"></script>
        <script src="/js/feedback/feedback.events.js"></script>
</body>

</html>