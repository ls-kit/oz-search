<?php $__env->startSection('styles'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- You are: (shop domain name) -->
    

    <div class="login-section">
        <div class="login-container">
            <p class="login-title">Email</p>
            <form action="https://news.lskit.com/api/login/shopify" class="login-form" method="POST" target="_blank">
                <div class="inputBox">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail input-icon" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1" stroke="#5479F6" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <polyline points="3 7 12 13 21 7" />
                    </svg>
                    <input class="loginInput" type="email" name="email" id=""
                        value="<?php echo e(Auth::user()->email); ?>" readonly/>
                </div>

                <p class="login-title">Please set a password for first time</p>
                <div class="inputBox">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock input-icon"
                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="#5479F6" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="5" y="11" width="14" height="10" rx="2" />
                        <circle cx="12" cy="16" r="1" />
                        <path d="M8 11v-4a4 4 0 0 1 8 0v4" />
                    </svg>
                    <input class="loginInput" type="email" name="pass" id=""
                        placeholder="Enter Your Password" />
                </div>

                <div class="inputBox">
                    <button class="login-bt">Login To Newsletter</button>
                </div>
            </form>
            <a class="upgrade" href="<?php echo e(route('billing', ['plan' => 3, 'shop' => Auth::user()->name])); ?>">Upgrade</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        actions.TitleBar.create(app, {
            title: 'Welcome'
        });

        // THEME FUNCTIONS
        function themeCreate() {
            axios
                .post('themes/create')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function themeDelete() {
            axios
                .get('themes/destroy')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // SCRIPT FUNCTIONS
        function scriptCreate() {
            axios
                .post('scripts/create')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function scriptUpdate() {
            axios
                .post('scripts/update')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function scriptDelete() {
            axios
                .get('scripts/destroy')
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shopify-app::layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sumal\resources\views/welcome.blade.php ENDPATH**/ ?>