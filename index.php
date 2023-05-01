<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Speed</title>
</head>
<body>
    <?php
        $n=10;
        function getName($n) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $randomString = '';
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            return $randomString;
        } 
        $word = getName(5);
    ?>

    <h1>Typing Speed Challenge</h1>
    <p>Complete the challenge within the given time.</p>
    <p>Paste is not allowed in the input field.</p>
    <hr><br>
    <p>Word: <b style="border:1px solid black; padding:5px;"><?php echo $word; ?></b></p>

    <div style="display:flex;">
        <p>Remaining time (second):</p>
        <p id="demo_value"></p>
    </div>

    <form action="" method="POST">
        <label for="txt">Enter text:</label>
        <input type="text" name="word" id="word" value="<?php echo $word; ?>" required hidden>
        <input style="padding:2px;" type="text" name="txt" id="txt" placeholder="Enter the word in box" onpaste="return false;" ondrop="return false;" required>
        <input style="padding:2px; cursor:pointer;" type="submit" name="submit" id="submit" value="Submit">
    </form>
    <br>

    <div style="display:flex; align-items:center; justify-content:flex-start; border:1px solid black; width:max-content; padding:5px;">
        <p>You've entered:</p><p class="display" style="font-weight:bold; padding-left:5px;"></p>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $word = $_POST['word'];
            $txt = $_POST['txt'];
            if($txt == $word){
                ?>
                <h2 style="color:green; font-style:italic; margin-top:20px;">Succedded...</h2>
                <?php
            }
            else{
                ?>
                <h2 style="color:red; font-style:italic; margin-top:20px;">Failed...</h2>
                <?php
            }
        }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        let seconds = 60;

        const makeIteration = () => {
            console.clear();
            if (seconds > 0) {
                console.log(seconds);
                document.getElementById("demo_value").innerHTML = seconds;     
                setTimeout(makeIteration, 1000);
            }
            seconds -= 1;

            if(seconds == 0){
                window.location.href = "./";
            }
        }
        setTimeout(makeIteration, 1000);
    </script>
    <script>
        $(document).ready(function(){
            $("#txt").on('keyup keydown',function(){
                $(".display").text("");

                var txt = $("#txt").val();
                $(".display").append(txt);
            });
        });
    </script>
</body>
<style>
    *{
        margin: 10px 5px 10px 5px;
        padding: 0;
        transition: 200ms ease-in-out;
        box-sizing: border-box;
        text-decoration: none;
    }
</style>
</html>