<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Tayssir - Login</title>

    <link rel="icon" type="image/png" href="<?php echo e(asset('img/favicon.png')); ?>">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('dashboard/css/sb-admin-2.min.css')); ?>" rel="stylesheet">

    <style>
        .login-container {
            display: flex;
            height: 100vh;
        }

        .login-form {
            flex: 1;
            padding: 50px;
            text-align: right;
        }

        .login-image {
            flex: 1;
            background-image: url('pharmacist.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-image img {
            max-width: 200px;
        }

        .small-logo {
            max-width: 100px;
        }

        .form-control-user {
            padding: 8px;
            font-size: 14px;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="login-container">
        <div class="login-image">
        </div>
        <div class="login-form">
            <div class="text-center">

            </div>
            <div class="login-form" style="margin-top: 35%;">
                <div class="text-center">
                    <img src="<?php echo e(asset('img/logo-grey.png')); ?>" class="small-logo">
                    <h4 class="h5 text-gray-700 mb-4"><?php echo e(__('sentence.Welcome')); ?></h4>
                </div>
                <form method="POST" action="<?php echo e(route('login')); ?>" class="user">
                    <div class="form-group">
                        <input id="email" type="email" class="form-control rounded-0 shoadow-none form-control-sm form-control-user <?php $__errorArgs = ['email'];
                                                                                                                                    $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                                                                                                                    if ($__bag->has($__errorArgs[0])) :
                                                                                                                                        if (isset($message)) {
                                                                                                                                            $__messageOriginal = $message;
                                                                                                                                        }
                                                                                                                                        $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                                                                                                                                                                if (isset($__messageOriginal)) {
                                                                                                                                                                                    $message = $__messageOriginal;
                                                                                                                                                                                }
                                                                                                                                                                            endif;
                                                                                                                                                                            unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus aria-describedby="emailHelp" placeholder="<?php echo e(__('sentence.Email')); ?>">
                        <?php $__errorArgs = ['email'];
                        $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                        if ($__bag->has($__errorArgs[0])) :
                            if (isset($message)) {
                                $__messageOriginal = $message;
                            }
                            $message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
                            if (isset($__messageOriginal)) {
                                $message = $__messageOriginal;
                            }
                        endif;
                        unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control rounded-0 shoadow-none form-control-sm form-control-user <?php $__errorArgs = ['password'];
                                                                                                                                            $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                                                                                                                            if ($__bag->has($__errorArgs[0])) :
                                                                                                                                                if (isset($message)) {
                                                                                                                                                    $__messageOriginal = $message;
                                                                                                                                                }
                                                                                                                                                $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                                                                                                                                                                    if (isset($__messageOriginal)) {
                                                                                                                                                                                        $message = $__messageOriginal;
                                                                                                                                                                                    }
                                                                                                                                                                                endif;
                                                                                                                                                                                unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="<?php echo e(__('sentence.Password')); ?>">
                        <?php $__errorArgs = ['password'];
                        $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                        if ($__bag->has($__errorArgs[0])) :
                            if (isset($message)) {
                                $__messageOriginal = $message;
                            }
                            $message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
                            if (isset($__messageOriginal)) {
                                $message = $__messageOriginal;
                            }
                        endif;
                        unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input class="custom-control-input" type="checkbox" name="remember" id="customCheck" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <?php echo e(csrf_field()); ?>

                            <label class="custom-control-label" for="customCheck"><?php echo e(__('sentence.Remember Me')); ?></label>
                        </div>
                    </div>
                    <button class="btn rounded-0  btn-sm btn-warning btn-user btn-block" type="submit"><?php echo e(__('sentence.Login')); ?></button>
                </form>
                <hr>
                <?php if (Route::has('password.request')) : ?>
                    <div class="text-center">
                        <a class="small" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('sentence.Forgot Your Password')); ?></a>
                    </div>
                <?php endif; ?>
            </div>

            <hr>
            <?php if (Route::has('password.request')) : ?>
                <div class="text-center">
                    <a class="small" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('sentence.Forgot Your Password')); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>

</html>
<?php /**PATH C:\Users\Admin\Documents\medecin.tayssir.cloud\resources\views/auth/login.blade.php ENDPATH**/ ?>