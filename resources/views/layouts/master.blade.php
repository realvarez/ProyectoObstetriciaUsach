<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.header')
</head>
	<body class="adminbody">
		<div id="main">
			@include('layouts.partials.topbar')
			@include('layouts.partials.leftsidebar')
			<div class="content-page" {{(\Request::route()->getName() == 'login' || \Request::route()->getName() == 'firstUsePassword')? 'style=margin-left:0px;':''}}>
				<div class="content">
					@include('layouts.partials.breadcrumb')
					@yield('content')
				</div>
			</div>
			@include('layouts.partials.footer')
        </div>
        @include('layouts.partials.scripts')
	</body>
</html>
