<div id="footer">
    <div class="container">
        <div class="row">
            <div class="center">
            	@if (Auth::guest())
            		<p>Copyright Bootsrap</p>
				@else
                <p>Find me on social media.</p>
		          	<i class="fa fa-facebook-official"></i>
		          	<i class="fa fa-instagram"></i>
		          	<i class="fa fa-snapchat"></i>
		          	<i class="fa fa-pinterest-p"></i>
		          	<i class="fa fa-twitter"></i>
		          	<i class="fa fa-linkedin"></i>
              	@endif
            </div>
        </div>
    </div>
</div>