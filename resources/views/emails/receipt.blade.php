<div>
	<h3 style="font-family: Arial, Helvetica, sans-serif;">{{ config('formable.site_title') }}</h3>
	<p><strong>Pöntun staðfest!</strong></p>
	<p style="font-family: Arial, Helvetica, sans-serif;">Takk fyrir að versla hjá okkur! Hér fyrir neðan má sjá kvittun fyrir pöntuninni.</p>

	@include('frontend.receipt', ['order' => $order])
</div>