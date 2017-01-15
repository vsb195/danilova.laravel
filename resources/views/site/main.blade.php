<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/skel.css" />
		<link rel="stylesheet" href="/css/style.css" />
		<link rel="stylesheet" href="/css/style-desktop.css" />
		<link rel="stylesheet" href="/css/style-wide.css" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-layers.min.js"></script>
		<script src="/js/init.js"></script>
		
	
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<!--
		Note: Set the body element's class to "left-sidebar" to position the sidebar on the left.
		Set it to "right-sidebar" to, you guessed it, position it on the right.
	-->
	<body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div class="inner">
							@yield('content')
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<!-- Logo -->
							<h1 id="logo"><a href="/">Блог выпечки</a></h1>
					
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="/">Все</a></li>
							@if (count($categories)>2)
						<!--
							<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										Категории <span class="caret"></span>
									</a>
	
									<ul class="dropdown-menu" role="menu">
										@foreach($categories as $category)
											<li>
												<a href="{{action('FrontController@category',['id'=>$category->id])}}">{{$category->title}}</a>
											</li>
										@endforeach
									</ul>
								</li>	
						-->								
							@else
								
							@endif	
							@foreach($categories as $category)
									<li><a href="{{action('FrontController@category',['id'=>$category->id])}}">{{$category->title}}</a></li>
								@endforeach	
				@foreach($menu as $item)
						<li><a href="{{action('PagesController@learn',['id'=>$item->id])}}">{{$item->title}}</a></li>
				@endforeach	
						@if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Вход</a></li>
                            <li><a href="{{ url('/register') }}">Регистрация</a></li>
                        @else
							@if (Auth::user()->is_admin==1)
							<li>
                                <a href="/adminzone">
                                    Панель управления
                                </a>
                            </li>
							@endif	
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif				
                                    	
                        		</ul>
							</nav>
					
						<!-- Text -->
							<section class="box text-style1">
								<div class="inner">
									<p>
										<strong>Striped:</strong> A free and fully responsive HTML5 site
										template designed by <a href="http://n33.co/">AJ</a> for <a href="http://html5up.net/">HTML5 UP</a>
									</p>
								</div>
							</section>
								
					
						<!-- Copyright -->
							<ul id="copyright">
								<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
					</div>
			</div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
	</body>
</html>
