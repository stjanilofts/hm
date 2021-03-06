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
				@if(\Request::is('um-okkur/starfsfolk'))
					<article>
						<header>
							<h1>{{ $page->title }}</h1>
						</header>
						
						<?php

						$employees = \App\Page::where('slug', 'starfsfolk')->first()->getSubs();

						?>

						<div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.inner'}">
							@foreach($employees as $k => $employee)
								<div class="uk-width-medium-1-3 uk-width-small-1-2">
									<div class="inner">
										<a href="/um-okkur/starfsfolk/{{ $employee->slug }}"><img src="/imagecache/profile/{{ $employee->img()->first() }}" /><br>
										<h3 class="uk-margin-small-top" style="margin-bottom: 0; padding-bottom: 0;">{{ $employee->title }}</h3></a>
										{{ $employee->subtitle ?: 'Starfstitill' }}
									</div>
								</div>
							@endforeach
						</div>

						<div class="uk-margin-top">
							<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
						</div>
					</article>
				@elseif(\Request::is('um-okkur/starfsfolk/*'))
					<article>
						<header>
							<h1>{{ $page->title }}</h1>
						</header>

						<div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.inner'}">
							<div class="uk-width-medium-1-3">
								<img src="/imagecache/article/{{ $page->img()->first() }}" style="width: 100%;" />
							</div>
							<div class="uk-width-medium-2-3">
								{!! cmsContent($page) !!}
							</div>
						</div>

						<div class="uk-margin-top">
							<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
						</div>
					</article>
				@else
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
						
						<div class="uk-margin-top">
							<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
						</div>
					</article>
				@endif
			</div>
		</div>

		<div class="uk-clearfix"></div>
	</div>

@stop