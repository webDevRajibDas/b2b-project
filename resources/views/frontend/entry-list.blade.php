<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>১ম পুনর্মিলনী অনুষ্ঠান List</title>
    <meta name="keywords" content="B2B Platform BD"/>
    <meta name="description" content="B2B Market Place Bangladesh ,B2B Platform">
    <meta name="author" content="B2B Market Place , b2b platform">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/favicon.png') }}">

    <!-- Shortcut Icon -->
    <link href="{{ asset('favicon/favicon.ico') }}" rel="shortcut icon">
    <link rel="apple-touch-icon" sizes="180x180" href=" {{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href=" {{asset('favicon/favicon-16x16.png')}}">
    {{--    <link rel="manifest" href=" {{asset('favicon/site.webmanifest')}}">--}}

    <!-- Google Fonts -->
    <script>
        WebFontConfig = {
            google: {families: ['Open+Sans:300,400,600,700,800', 'Poppins:200,300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Nanum+Brush+Script:400,700,800']}
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset('assets/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo23.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <style>

        .entry-form {
            display: table;
            margin: 0 auto;
            max-width: 100%;
            width: 80%;
            padding: 0 20px;
        }
        div.center-sign{
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }


        .entry-form .center-sign {
            display: table-cell;
            padding-top: 20px;
            vertical-align: middle;

        }

        .entry-form .card-sign {
            background: transparent;
        }

        .entry-form .card-sign .card-title-sign .title {
            background-color: #2f2f2f;
            border-radius: 5px 5px 0 0;
            color: #FFF;
            display: inline-block;
            font-size: 12px;
            font-size: 2rem;
            padding: 13px 17px;
            vertical-align: bottom;
        }

        .entry-form .card-sign .card-body {
            background: #FFF;
            border-top: 5px solid #CCC;
            border-radius: 5px 0 5px 5px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            padding: 33px 33px 15px;
        }



    </style>
</head>

<body>
<div class="page-wrapper">
    <main class="main">
        <section class="entry-form mb-3">
            <div class="center-sign" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 20px">
                <div class="panel card-sign">
                    <div class="card-title-sign mt-1 text-center p-2">
                        <h3 class="title text-uppercase font-weight-bold m-0">
                            স্মৃতির টানে প্রিয় প্রাঙ্গনে, এসো মিলিত হই প্রানের বন্দনে। ১ম পুনর্মিলনী অনুষ্ঠান ,২০২৫ রতনদি তালতলী মাধ্যমিক বিদ্যালয়, গলাচিপা, পটুয়াখালী। এসএসসি প্রথম ব্যাচ হইতে ২০২৪ ব্যাচ পর্যন্ত।
                        </h3>

                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sl : </th>
                                    <th scope="col">সদস্য নাম:</th>
                                    <th scope="col"> পিতার নাম :</th>
                                    <th scope="col">মাতার  নাম :</th>
                                    <th scope="col">পাশের সন :</th>
                                    <th scope="col"> বর্তমান অবস্থান :</th>
                                    <th scope="col"> মোবাইল নাম্বার :</th>
                                    <th scope="col"> হোয়াটসঅ্যাপ নাম্বার :</th>
                                    <th scope="col"> ফী জমা দিয়েছেন :</th>
                                    <th scope="col"> ট্রান্সাকশন আইডি :</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->father_name}}</td>
                                        <td>{{$member->mother_name}}</td>
                                        <td>{{$member->pass_year}}</td>
                                        <td>{{$member->present_address}}</td>
                                        <td>{{$member->mobile}}</td>
                                        <td>{{$member->whats_up}}</td>
                                        <td><span class="badge badge-pill badge-warning">{{$member->r_fee_type}}</span></td>
                                        <td>{{$member->transaction_id}}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </section>
    </main>

</div>

<!-- Loader -->
<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div class="mobile-menu-overlay"></div>

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/js/optional/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
