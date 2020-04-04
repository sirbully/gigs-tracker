<!DOCTYPE html>
<html>

<head>
    <title>Mister Shakes Gigs Tracker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        body {
            margin: 0;
            padding: 50px;
            width: 100%;
            background-color: #f9f3f2;
            color: #000;
            font-family: "IBM Plex Sans", Arial, Helvetica, sans-serif;
            font-size: 1rem;
        }

        a {
            color: #000;
        }

        .brand {
            font-family: "IBM Plex Mono", Arial, Helvetica, sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.2rem;
            margin-bottom: 50px;
        }

        .brand span {
            background: #000;
            padding: 10px 20px;
            color: #fff;
        }

        #info {
            width: 30%;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            padding: 10px 25px;
        }

        label {
            padding: 3px 5px;
            background: rgb(34, 34, 34);
            color: #fff;
            font-family: "IBM Plex Mono", Arial, Helvetica, sans-serif;
            text-transform: uppercase;
            margin-right: 25px;
        }
    </style>
</head>

<body>
    <div class="brand"><span>Mister Shakes</span></div>
    <div>
        <p>Hi, <?= $name ?>!</p>
        <p>You have a gig! Check out the details by clicking the link below.</p>
        <div id="info">
            <label><a href="http://gigs.elliottrooney.co.uk/gigs/<?= $gig ?>">View Gig</a></label>
        </div>
    </div>
</body>

</html>