<?php
global $command;
global $output;

if(isset($_POST["command"])){
    if ($command != null){
        $output = shell_exec($command);
        echo $output;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="Assets/LOGO/logo.png" type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
    <link rel="stylesheet" href="CSS/ssh.css">
</head>

<body>
    <main>
        <div id="ssh">
            <form id="commandForm">
                <label for="command">Enter Command:</label>
                <input type="text" id="command" name="command">
                <button type="submit">Run Command</button>
            </form>
            <div id="output">
                <!-- Output will be displayed here -->
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#commandForm').submit(function (e) {
                e.preventDefault(); // Prevent form submission
                var command = $('#command').val(); // Get command value
                $.ajax({
                    type: 'POST',
                    url: '/SPPT/admin',
                    data: { command: command },
                    success: function (response) {
                        $('#output').html('<pre>' + response + '</pre>'); // Display output
                    }
                });
            });
        });
    </script>
</body>

</html>
