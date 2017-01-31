	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
        
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
                
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Registrations</h4>

				</div>

				<div class="modal-body">
                        
                    <form class="form-horizontal" method="POST" id="register-form" data-action="insertMember" data-controller="index">
                          <fieldset>
                            <div class="control-group">
                              <!-- Username -->
                              <label class="control-label"  for="username">Username</label>
                              <div class="controls">
                                <input type="text" id="username" class="form-control input-xlarge" name="username" placeholder="Username" >
                                <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                              </div>
                            </div>

                            <div class="control-group">
                              <!-- E-mail -->
                              <label class="control-label" for="email">E-mail</label>
                              <div class="controls">
                                <input type="text" id="email" class="form-control input-xlarge" name="email" placeholder="email@email.com">
                                <p class="help-block">Please enter your e-mail</p>
                              </div>
                            </div>
                              
                            <div class="control-group">
                              <!-- Telephone -->
                              <label class="control-label" for="telephone">Telephone</label>
                              <div class="controls">
                                <input type="text" id="telephone" class="form-control input-xlarge" name="telephone" placeholder="Telephone Number">
                                <p class="help-block">Please enter your Telephone Number</p>
                              </div>
                            </div>
                              
                            <div class="control-group">
                              <!-- Address -->
                              <label class="control-label" for="address">Address</label>
                              <div class="controls">
                                <input type="text" id="address" class="form-control input-xlarge" name="address" placeholder="Address">
                                <p class="help-block">Please enter your address</p>
                              </div>
                            </div>  
                              
                            <div class="control-group">
                              <!-- Password-->
                              <label class="control-label" for="password">Password</label>
                              <div class="controls">
                                <input type="password" id="password" class="form-control input-xlarge" name="password" placeholder="Password">
                                <p class="help-block">Password should be at least 6 characters</p>
                              </div>
                            </div>

                            <div class="control-group">
                              <!-- Password -->
                              <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                              <div class="controls">
                                <input type="password" id="password_confirm" class="form-control input-xlarge" name="password_confirm" placeholder="Confirm Password" class="input-xlarge">
                                <p class="help-block">Please confirm password</p>
                              </div>
                            </div>

                            <div class="control-group">
                              <!-- Button -->
                              <div class="controls">
                                <button class="btn btn-success">Register</button>
                              </div>
                            </div>
                          </fieldset>
                        </form>
				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-default send" data-dismiss="modal">Close</button>

				</div>

			</div>

		</div>

	</div>
	
	<hr>

	<footer>
		
		<p>&copy; 2016 Emmanuel Hiss</p>
		
	</footer>      


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script>window.jQuery || document.write('<script src="css/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="scripts/jquery.inview.js"></script>
	<script src="css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="css/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
	<script type="text/javascript" src="slick/slick.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>  

	</body>

</html>