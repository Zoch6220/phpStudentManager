
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="styles.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
     <style>
         .form-control-contrast {
             border: 2px solid #504f4f;
             background-color: #fff;
             transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
         }
         .form-control-contrast:focus {
             border-color: #80bdff;
             box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
         }
     </style>
 </head>
 <body>
 <section class="vh-100" style="background-color: grey;">
     <div class="container py-5 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
             <div class="col col-xl-10">
                 <div class="card" style="border-radius: 1rem;">
                     <div class="row g-0">

                         <div class="col-md-6 col-lg-7 d-flex align-items-center">
                             <div class="card-body p-4 p-lg-5 text-black">

                                 <form action="VerifyLogin.php" method="post">

                                     <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                     <div data-mdb-input-init class="form-outline mb-4">
                                         <label class="form-label" for="formEmail">Email address</label>
                                         <input type="email" name="email" id="formEmail" class="form-control form-control-lg form-control-contrast" />

                                     </div>

                                     <div data-mdb-input-init class="form-outline mb-4">
                                         <label class="form-label" for="formPass">Password</label>
                                         <input type="password" name="password" id="formPass" class="form-control form-control-lg form-control-contrast " />

                                     </div>

                                     <div class="pt-1 mb-4">
                                         <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>

                                     </div>

                                 </form>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

</body>
 </html>

