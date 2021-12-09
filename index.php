<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <title>Nueapop | Bootstrap</title>
</head>
<style>
    * {
        font-family: 'Kanit', sans-serif;
    }

    .bg1 {
        background-color: red;
    }

    .bg2 {
        background-color: green;
    }

    .bg3 {
        background-color: blue;
        width: 200px;
        height: 1300px;
        float: left;
    }

    .bg4 {
        background-color: darkkhaki;
        text-align: center;
        width: 80%
    }
</style>

<body>
    <div class="container">
        <img src="https://pbs.twimg.com/profile_banners/1203410500798832640/1586146932/1500x500"
            class="img-fluid" alt="..." width="90%">
        <div class="container">
            <br>
            <div class="col-12 bg3"></div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 20rem;">
                    <img src="https://i.pinimg.com/564x/91/8d/97/918d97d95680cb082c2deb978dde2289.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Beautiful 'Monkey D Luffy' Poster Print by Mauricio Somoza ✓ Printed on
                            Metal ✓ Easy Magnet Mounting ✓ Worldwide Shipping. Buy online at DISPLATE.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 20rem;">
                    <img src="https://i.pinimg.com/736x/22/9a/31/229a311470ac86d5790b5c6f0c2bfce0.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Beautiful 'Portgas D. Ace profile' Poster Print by Mauricio Somoza ✓
                            Printed on Metal ✓ Easy Magnet Mounting Buy online at DISPLATE.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <br>
                <button id="btnBack" class="btn btn-danger"> back </button>
                <div id="main">
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody id="tblPost">
                        </tbody>
                    </table>
                </div>
                <div id="detail">
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>UserID</th>
                            </tr>
                        </thead>
                        <tbody id="tblDetails">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 bg4">
                <p>63111934</p>
                <p>DEV | Nueapop Morasin</p>
            </div>
        </div>
    </div>
</body>
<script>
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();
        $("#btnBack").show();
        var url = "https://jsonplaceholder.typicode.com/posts/" + id

        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='detailROW'";
                line += "><td>" + data.id + "</td>"
                line += "<td><b>" + data.title + "</b><br/>"
                line += data.body + "</td>"
                line += "<td>" + data.userId + "</td>"
                line += "</tr>";
                $("#tblDetails").append(line);
            })
            .fail((xhr, err, status) => {

            })


    }

    function LoadPosts() {
        var url = "https://jsonplaceholder.typicode.com/posts"
        var i = 0;
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    i++;
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button class='btn btn-success' onClick='showDetails(" + item.id + ");'>Link</button></td>"
                    line += "</tr>";
                    $("#tblPost").append(line);
                    if (i == 10) {
                        loadPost().stop();
                    };
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {

            })
    }

    $(() => {
        LoadPosts();
        $("#detail").hide();
        $("#btnBack").hide();
        $("#btnBack").click(() => {
            $("#main").show();
            $("#detail").hide();
            $("#detailROW").remove();
            $("#btnBack").hide();
        });
    });
</script>

</html>
