<!doctype html>
<html ⚡>
<head>
    <meta charset="UTF-8">
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <link rel="canonical" href="http://www.cbp-exercises.local:8080/php3/noteform.php" />
    <style amp-boilerplate>body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }</style>
    <noscript>
        <style amp-boilerplate>body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }</style>
    </noscript>

    <title>AMP Form</title>

</head>
<body>

<amp-analytics>
    <script type="application/json">
        {
            "requests": {
                "event": "https://www.ampproject.org/static/img/logo-blue.svg?eid=${eventId}"
            },
            "triggers": {
                "formSubmitSuccess": {
                    "on": "amp-form-submit-success",
                    "request": "event",
                    "vars": {
                        "eventId": "form-submit-success"
                    }
                },
                "formSubmitError": {
                    "on": "amp-form-submit-error",
                    "request": "event",
                    "vars": {
                        "eventId": "form-submit-error"
                    }
                }
            }
        }
    </script>
</amp-analytics>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=notes;charset=utf8', 'root', 'rootroot');
if ($_POST) {
    $stmt = $pdo->prepare('INSERT INTO notes (title, note, email, created) VALUES (?,?,?,NOW())');
    $stmt->execute(array($_POST['title'], $_POST['note'], $_POST['email']));
    var_dump($_POST);
}
?>
<h1>This is my form!</h1>
<form method="post" action-xhr="#" custom-validation-reporting="show-all-on-submit" target="_top">
    <fieldset>
        <label>
            <span>Title:</span>
            <input type="text" name="title" required>
        </label>
        <br>
        <br>
        <label>
            <span>Notes:</span>
            <textarea id="note" name="note" rows="20" cols="30" required></textarea>
        </label>
        <br>
        <br>
        <label>
            <span>Email:</span>
            <input type="email" name="email" required>
        </label>
        <br>
        <label>
            <input name="type" value="reminder" type="radio" on="change:myform.submit"> Reminder
        </label>
        <label>
            <input name="type" value="note" type="radio" on="change:myform.submit"> Note
        </label>
        <label>
            <input name="type" value="todo" type="radio" on="change:myform.submit"> To-Do
        </label>
        <br><br>
        <label>
            <span>Time</span>
            <input type="time" name="time" required>
        </label>
        <br>
        <br>
        <input type="submit" value="Subscribe">
        <br>
    </fieldset>
    <div submit-success>
        <template type="amp-mustache">
            Subscription successful!
        </template>
    </div>
    <div submit-error>
        <template type="amp-mustache">
            Subscription failed!
        </template>
    </div>
</form>

</body>
</html>