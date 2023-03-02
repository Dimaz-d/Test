<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>MyTest</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        .nav-link{
            color: white;
        }
        .nav-link:hover{
            color: orange;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css" integrity="sha512-B9GRVQaYJ7aMZO3WC2UvS9xds1D+gWQoNiXiZYRlqIVszL073pHXi0pxWxVycBk0fnacKIE3UHuWfSeETDCe7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<body class="bg-light">
    <nav class="navbar navbar-expand-lg  bg-dark sticky-top overflow-hidden">
        <div class="container">
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-white">
                        <a class="nav-link" href="{{route('catalog')}}">Catalog</a>
                    </li>
                    <li class="nav-item text-white">
                        <a class="nav-link" href="{{route('forms')}}">Forms</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="py-5  overflow-hidden">
            <div class="row g-5">
               @yield('main')
            </div>
        </section>

    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small  overflow-hidden">
        <p class="mb-1">2023 Bergman</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/js/index.js')}}"></script>

@stack('script')
</body></html>
