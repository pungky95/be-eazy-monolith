<html lang="en">
<head>
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
    <noscript>
        <link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}"/>
    </noscript>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main">
        <header>
            <span class="avatar"><img src="{{asset('images/avatar.jpg')}}" alt=""/></span>
            <h1>{{config('app.name')}}</h1>
            <p>Make Designer life easy</p>
        </header>

        <hr/>
        <h2>Upload Your Image!</h2>
        <form method="post" action="{{route('remove-background')}}" id="upload-image-form"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="model" value="u2netp">
            <div class="fields">
                <div class="field">
                    <input type="radio" checked id="without_smooth" name="is_smooth" value="0">
                    <label for="without_smooth">Without Smoothing</label><br>
                    <input type="radio" id="with_smooth" name="is_smooth" value="1">
                    <label for="with_smooth">With Smoothing</label><br>
                </div>
            </div>
            <div class="fields">
                <div class="field">
                    <input type="file" name="file" id="file" placeholder="Your Image"/>
                </div>
            </div>
            <ul class="actions special">
                <li><a href="javascript:" onclick="document.getElementById('upload-image-form').submit();"
                       class="button">Submit</a></li>
            </ul>
        </form>
        <hr/>

        <footer>
            {{--            <ul class="icons">--}}
            {{--                <li><a href="#" class="icon brands fa-twitter">Twitter</a></li>--}}
            {{--                <li><a href="#" class="icon brands fa-instagram">Instagram</a></li>--}}
            {{--                <li><a href="#" class="icon brands fa-facebook-f">Facebook</a></li>--}}
            {{--            </ul>--}}
        </footer>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy;{{config('app.name')}}</li>
            <li>Design: <a href="{{env('APP_URL')}}">Pungky Tech</a></li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function () {
            document.body.className = document.body.className.replace(/\bis-preload\b/, '');
        });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>

</body>
</html>
