<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div id="form-main">
        <div id="form-div">
            <form action="login_act.php" method="POST" class="form" id="form1">

                <p class="name">
                    <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
                </p>

                <p class="email">
                    <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
                </p>

                <p class="password">
                    <input name="lpw" type="text" class="validate[required,custom[email]] feedback-input" id="password" placeholder="Password" />
                </p>




                <div class="submit">
                    <input type="submit" value="LOGIN" id="button-blue" />
                    <div class="ease"></div>
                </div>
            </form>
        </div>

</body>

</html>