<!doctype html><html lang="en"><head>    <meta charset="UTF-8">    <meta name="viewport"          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    <meta http-equiv="X-UA-Compatible" content="ie=edge">    <title>Document</title>    <link rel="stylesheet" href="../../public/style/admin/admin.css">    <script src="https://code.jquery.com/jquery-3.1.1.js"></script></head><style>    #submit{        display: block;        text-align: center;        line-height: 3;        color: white;        border: 0;        background-color: transparent;        border: 2px solid cyan;        height:50px;        width:150px;        margin-top: 10px;        border-radius: 5px;        transition: 150ms all linear;    }    #submit:hover{        background-color: cyan;        color: white;    }</style><body><div id="wrapper">    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">        <div class="navbar-header">            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">                <span class="sr-only">Toggle navigation</span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>            </button>            <a class="navbar-brand" href="http://localhost/own_framework/admin/">Admin Panel</a>        </div>        <div class="collapse navbar-collapse navbar-ex1-collapse">            <ul id="active" class="nav navbar-nav side-nav">                <?php include "navbar.php"; ?>            </ul>        </div>    </nav>    <?php    foreach ($update as $ap){    }    ?>    <form action="http://localhost/own_framework/admin/listupdate/<?php echo $ap['id']; ?>" method="post">        <label for="">New Title</label>        <input type="text" style="color:black"  name="title" value="<?php echo $ap['title'];?>"class="form-control">        <label for="">Link</label>        <input type="text" style="color:black" name="link" value="<?php echo $ap['link'];?>" class="form-control">        <label for="">Menu level</label>        <select class="form-control" name="levels" id="levels">            <script>                for(var i = 1; i <= 3; i++){                    document.write("<option  style='color:black' value="+i+">"+i+"</option>");                }            </script>        </select>        <label for="">Appending</label>        <select class="form-control" name="append" id="append">            <script>                $("#levels").on("change", function () {                    var a = $("#levels").val();                    if (a != 1){                        var menus = ["menu", "menu1"];                        for(var i = 0; i < menus.length; i++){                            $("<option style='color:black'>"+menus[i]+"</option>").appendTo("#append");                        }                    }else{                        $("#append").text("").attr("disabled");                    }                })            </script>        </select> <br>        <label for="">Menu replace</label>        <select name="place" id="place">            <script>                var contents = ["header", "footer"];                for(var i = 0; i < contents.length; i++){                    document.write("<option>"+contents[i]+"</option>");                }            </script>        </select> <br>        <input type="submit" value="Change" id="submit" name="submit">    </form></div></body></html>