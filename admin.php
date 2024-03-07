<?php
global $command;
global $output;

if (isset($_POST["command"])) {
    if ($command != null) {
        // Write the command to a Python script
        // $pythonScript = fopen("executer.py", "w");
        // fwrite($pythonScript, "import subprocess\n");
        // fwrite($pythonScript, "output = subprocess.getoutput('$command')\n");
        // fwrite($pythonScript, "print(output)");
        // fclose($pythonScript);

        // Execute the Python script and capture the output
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
                var existingOutput = $('#output').text().trim(); // Get existing output content
                $.ajax({
                    type: 'POST',
                    url: '',
                    data: { command: command },
                    success: function (response) {
                        var outputContent = existingOutput ? existingOutput + '\n' + response : response;
                        $('#output').text(outputContent); // Update output
                        console.log(outputContent)
                    },
                    error: function (xhr, status, error) {
                        var errorMessage = "Request: " + xhr.statusText + "\n" + "Response: " + xhr.responseText;
                        $('#output').text(errorMessage); // Display error message
                    }
                });
            });
        });
    </script>

</body>

</html>