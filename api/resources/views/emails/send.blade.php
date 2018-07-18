<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background: #828282; 
                margin: 0px;
                width: 100%;
            }
            
            .title {
                background: #232323;
                color: white;
                box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
                text-align: center;
                width: 100%;
            }
            
            .message {
                color: #232323;
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <div class="">
            <h1 class="title">{{$title}}</h1>
            <div>
                <p class="message">{{$content}}</p>
            </div>
        </div>
    </body>
</html>
