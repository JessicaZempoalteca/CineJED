<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contactanos</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Contactanos</title>
</head>
    <section class="page-section" id="contact">
    <div class="container" id="advanced-search-form">
       <center> <h2>Contactanos</h2></center>
       <form id="contactForm" data-sb-form-api-token="API_TOKEN">
        <div class="row align-items-stretch mb-5">

            <div class="form-group">
                <label for="first-name">Nombre</label>
                <input class="form-control" id="name" type="text" placeholder="Nombre" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <div class="form-group">
                <label for="country">Ciudad</label>
                <input type="text" class="form-control" placeholder="Country" id="Ciudad">
            </div>
            <div class="form-group">
                <label for="number">Numero Telefonico</label>
                <input class="form-control" id="phone" type="tel" placeholder="Numero Telefonico*" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
            </div>
            <div class="form-group">
                <label for="age">Edad</label>
                <input type="text" class="form-control" placeholder="Edad" id="Edad">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" placeholder="Email *" data-sb-validations="required,email" />
                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>
            <div class="form-group">
                <label for="email">Mensaje</label>
                    <!-- Message input-->
                    <textarea class="form-control" id="message" placeholder="Tu Mensaje " data-sb-validations="required"></textarea>
                    <div class="invalid-feedback" data-sb-feedback="message:required">Mensaje requerido</div>
                </div>
            </div>
</body>
</html>
<div class="d-none" id="submitSuccessMessage">
    <div class="text-center text-white mb-3">
        <div class="fw-bolder">mensaje enviado</div>
        Gracias por tu opinion
        <br />
        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
    </div>
</div>
<!-- Submit error message-->
<!---->
<!-- This is what your users will see when there is-->
<!-- an error submitting the form-->
<div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error en tu mensaje!</div></div>
<!-- Submit Button-->
<div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
</form>
</div>
</section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Tu Website 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
