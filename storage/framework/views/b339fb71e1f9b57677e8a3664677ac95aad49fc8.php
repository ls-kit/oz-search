<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login-section input:focus {
            outline: none;
        }

        .login-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-section .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .login-section .login-container .login-title {
            color: #4f4f4f;
            font-size: 20px;
            font-weight: 500;
            margin: 0.5rem 0;
        }

        .login-section .login-container .login-form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .login-section .login-container .login-form .inputBox {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-section .login-container .login-form .inputBox .input-icon {
            position: absolute;
            left: 7px;
        }

        .login-section .login-container .login-form .inputBox .loginInput {
            padding: 10px 20px 10px 35px;
            outline: none;
            border: 1px solid #5479f6;
            border-radius: 5px;
            width: 100%;
        }

        .login-section .login-container .login-form .login-title {
            color: #4f4f4f;
            font-size: 20px;
            font-weight: 500;
            margin: 0.5rem 0;
        }

        .login-section .login-container .login-form .login-bt {
            background: #5479f6;
            border-radius: 5px;
            margin: 10px 0;
            padding: 10px 15px;
            font-size: 18px;
            color: #ffffff;
            font-weight: 500;
            width: 70%;
            text-align: center;
        }

        .login-section .login-container .login-form .upgrade {
            font-weight: 500;
            font-size: 22px;
            line-height: 24px;
            text-decoration-line: underline;
            color: #5479f6;
        }

        @media  screen and (min-width: 992px) {
            .login-section .login-container .login-form .inputBox {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <main>
        <div class="login-section">
            <div class="login-container">
                <p class="login-title">Our Sapp</p>
                <form action="<?php echo e(url('/authenticate')); ?>" method="GET" class="login-form">
                    <div class="inputBox">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail input-icon"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="#5479F6"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <polyline points="3 7 12 13 21 7" />
                        </svg>
                        <input class="loginInput" type="text" name="shop" id=""
                            placeholder="site.myshop.com" required/>
                    </div>

                    <div class="inputBox">
                        <button class="login-bt">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
<?php /**PATH C:\laragon\www\sumal\resources\views/shopify/login.blade.php ENDPATH**/ ?>