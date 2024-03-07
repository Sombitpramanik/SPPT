<?php
if (isset($_POST["command"])) {
    $command = $_POST["command"];
    echo "button presed";
    if ($command != null) {
        echo "value not null";
        echo $command;
        // Write the command to a Python script
        // $pythonScript = fopen("executer.py", "w");
        // fwrite($pythonScript, "import subprocess\n");
        // fwrite($pythonScript, "output = subprocess.getoutput('$command')\n");
        // fwrite($pythonScript, "print(output)");
        // fclose($pythonScript);

        // Execute the Python script and capture the output
        $output = shell_exec($command);
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
                <button type="submit" name="command">Run Command</button>
            </form>
            <div id="output">
                <?php echo $output; ?>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function outputExtractor(wholeHTML) {
            // Create a temporary div element
            var tempDiv = document.createElement('div');
            tempDiv.style.display ="none";
            // Set the innerHTML of the temporary div to the provided HTML
            tempDiv.innerHTML = wholeHTML;

            // Find the element with ID #output
            var outputElement = tempDiv.querySelector('#output');

            // Check if the element exists
            if (outputElement) {
                // Return the innerHTML of the found element
                return outputElement.innerHTML;
            } else {
                // If element with ID #output is not found, return null or an appropriate value
                return null;
            }
        }

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
                        let holeHTML = response;
                        let output = outputExtractor(holeHTML);

                        $('#output').text(output); // Update output
                        console.log(output);
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