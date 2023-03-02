<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>MyTest</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css" integrity="sha512-B9GRVQaYJ7aMZO3WC2UvS9xds1D+gWQoNiXiZYRlqIVszL073pHXi0pxWxVycBk0fnacKIE3UHuWfSeETDCe7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body class="bg-light">

<div class="container">
    <main>
        <section class="py-5">
            <div class="row g-5">
                <div class="col-md-8">
                    <h4 class="mb-3">Set JSON Object</h4>
                    <form class="needs-validation" id="requestCreateForm">
                        @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="uToken" class="form-label">Your Token</label>
                                    <input type="text" class="form-control" id="uToken" placeholder="" value="" required="">
                                    <div class="invalid-feedback">
                                        Valid uToken name is required.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="data" class="form-label">Your Data</label>
                                        <input type="text" name="data" class="form-control" id="data" placeholder="" value='{"title": "Ban","price": 2000, "count": 1,"description": "qwerty"}' required="">
                                    <div class="invalid-feedback">
                                        Valid Data name is required.
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">

                            <h4 class="mb-3">Type</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input id="get" name="type" value="get" type="radio" class="form-check-input"  required="">
                                    <label class="form-check-label" for="get">Get</label>
                                </div>
                                <div class="form-check">
                                    <input id="post" name="type" value="set" type="radio" class="form-check-input" checked="" required="">
                                    <label class="form-check-label" for="post">Post</label>
                                </div>
                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Set</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <h4 class="mb-3">Create JSON Object</h4>
                    <form class="needs-validation" id="requestSetForm">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="uToken" class="form-label">Your Token</label>
                                <input type="text" class="form-control" id="uToken" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Valid uToken name is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="itemId" class="form-label">Item Id</label>
                                <input type="number" class="form-control" name="id" id="itemId" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Valid Id is required.
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="data" class="form-label">Your Data</label>
                                <input type="text" name="data" class="form-control" id="data" placeholder="" value='{"title": "Ban","price": 2000, "count": 1,"description": "qwerty"}' required="">
                                <div class="invalid-feedback">
                                    Valid Data name is required.
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">

                        <h4 class="mb-3">Type</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="get" name="type" value="get" type="radio" class="form-check-input"  required="">
                                <label class="form-check-label" for="get">Get</label>
                            </div>
                            <div class="form-check">
                                <input id="post" name="type" value="set" type="radio" class="form-check-input" checked="" required="">
                                <label class="form-check-label" for="post">Post</label>
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Set</button>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">2022 Bergman</p>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<script>
    document.querySelector('#requestCreateForm').addEventListener('submit',async (e) => {
        e.preventDefault()
        let token = e.target.querySelector('#uToken').value
            let response = await fetch('/createData',{
                method: 'POST',
                headers:{
                    Authorization: `Bearer ${token}`,
                    Accept :'application/json',
                },
                body : new FormData(e.target)
            }).then( data => {
                console.log(data)
                switch (data.status){
                    case 200:
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: `Object has been created`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        break;
                    case 401:
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Token',
                            text: 'Check your input',
                        })
                        break;
                    case 500:
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                        break;
                }
                }

            )
            console.log(JSON.parse(response))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: `ID: ${JSON.parse(response).id}`,
                showConfirmButton: false,
                timer: 1500
            })
    })
</script>
<script>
    document.querySelector('#requestSetForm').addEventListener('submit',async (e) => {
        e.preventDefault()
        let token = e.target.querySelector('#uToken').value
        let response = await fetch('/setData',{
            method: 'POST',
            headers:{
                Authorization: `Bearer ${token}`,
                Accept :'application/json',
            },
            body : new FormData(e.target)
        }).then( data => {
                switch (data.status){
                    case 200:
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Object has been edited',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        break;
                    case 410:
                        Swal.fire({
                            icon: 'error',
                            title: 'You don`t have item with this ID',
                            text: 'Check your input',
                        })
                        break;
                    case 401:
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Token',
                            text: 'Check your input',
                        })
                        break;
                    case 500:
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                        break;
                }
            }

        )
        console.log(JSON.parse(response))
    })
</script>
</body></html>
