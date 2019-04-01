<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
  <style>
            @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900');

        body{
            background: orange;
            width: 100%;
            margin: 0;

        }

        .content-logos{
            background-color:white; 
            width: 100%;
            justify-content:space-between;
            display: flex;
            flex-wrap: wrap;
        }

        .logo-sist{    
            width: 400px;
            height: 150px;
            margin-left: 6%;
        }

        .logo-ufps{
            width: 450px;
            height: 150px;
            margin-right: 6%;
        }

        .content-sat{
            background-color:#C90E15;   
            width: 100%;
            height: 250px;
            padding: 1px;
            display: flex;
            flex-wrap: wrap;
            align-items:center;
            justify-content:space-around;
        }

        .circle{
            background: white;
            height: 180px;
            width: 180px;
            border-radius: 100%;
            flex-wrap: wrap;
            flex-direction: row;
            display: flex;
            justify-content: center;
            -webkit-box-shadow: 10px 10px 41px -27px rgba(0,0,0,0.43);
            -moz-box-shadow: 10px 10px 41px -27px rgba(0,0,0,0.43);
            box-shadow: 10px 10px 41px -27px rgba(0,0,0,0.43);
        }

        .content-logo-sat{
            /* background: rebeccapurple; */
            height: min-content;
            display: flex;
            flex-direction: column; 
            margin: 5%;
        }

        .logo{
            padding-top:10px;
            height: 110px;
            width: 100px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .logo-title{
            color: #C90E15;
            height: min-content;
            font-size: 2.1em;  
            font-weight: 900;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            
        }

        .content-words{
            /* background: green; */
            color: white;
            font-size: 1.5em;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            height: 180px;
            width: 500px;
            flex-wrap: wrap;
            flex-direction: row;
            display: flex;
            justify-content: center;
        }


        .content-qualification{
            background-color:#ECF0F5; 
            display: flex;
            flex-wrap: wrap;
            align-items:center;
            justify-content:space-around;
        }

        /* estrellas  */
        .clasificacion{
            text-align: center;
            margin: 0 auto;
            direction: rtl;
            unicode-bidi: bidi-override;
        }

        .star {
            font-size: 50px;
            color: grey;
        }

        .clasificacion input[type="radio"] {
            display: none;
        }
          
        .star:hover,
        .star:hover ~ .star {
            color: orange;
        }
          
        .clasificacion input[type="radio"]:checked ~ .star {
            color: orange;
        }

        /* fin estrellas  */

        .title-feedback{
            text-align : center;
            font-family:  'Montserrat', sans-serif;
            /* font-weight: 500; */
        }
  </style>
</head>
<body>
      @yield('formulario')
</body>
</html>