@extends('frontend.layout')

@section('title', isset($page) ? $page->title : '')

@section('content')

	<?php

	$menuActive = $page->hasSubs() || $page->hasParent();

	?>

	<div class="container container-center container-padding2 padding-large-top padding-large-bottom">
		<div class="page">
			@if($menuActive)
				<div class="submenu uk-margin-large-bottom">
					<nav>
						{!! kalMenuBasicFrom(\Request::segment(1)) !!}
					</nav>
				</div>
			@endif

			<div class="{{ $menuActive ? 'page-with-menu-content' : 'page-content' }}">
				<article>
					<header>
						<h1>{{ $page->title }}</h1>
					</header>
					
					{!! cmsContent($page) !!}

					@if(\Request::is('hafa-samband'))
						<div>
							<hr>

							@include('frontend.forms.contact')
						</div>
					@endif
				</article>
			</div>
		</div>

		<div class="uk-clearfix"></div>
	</div>

@stop