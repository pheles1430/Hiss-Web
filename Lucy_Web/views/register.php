<ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">User</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Dog</a></li>
                   <!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->
                </ul>

                <div class="tab-content">
                    
                    <div role="tabpanel" class="tab-pane active" id="home">
                    
                                                <br />

                            <div class="Lcontainer">
                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <form  method="POST" id="register-form" data-action="insertMember" data-controller="home">
                                                <div class="form-group">
                                                    <h2>Create account</h2>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupName">Username</label>
                                                    <input  id="username"  type="text" maxlength="50" name="username" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupEmail">Email</label>
                                                    <input id="email" type="email" maxlength="50"  name="email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupEmailagain">Address</label>
                                                    <input id="address" type="text" maxlength="50" name="address" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupEmailagain">Telephone</label>
                                                    <input id="telephone" type="text" maxlength="50" name="telephone" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupPassword">Password</label>
                                                    <input id="password"  type="password" maxlength="25" name="password" class="form-control" placeholder="at least 6 characters" length="40">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupPasswordagain">Confirm Password</label>
                                                    <input id="password_confirm" type="password" maxlength="25" name="password_confirm" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Upload profil picture</label>
                                                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="submit">
                                                    <small id="fileHelp" class="form-text text-muted">*Optional </small>
                                                </div>

                                                <div class="form-group">
                                                    <button id="submit" type="submit" class="btn btn-info btn-block">Create your account</button>
                                                </div>
                                                <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
                                                <hr>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                    
                        
                    
                        <div role="tabpanel" class="tab-pane" id="profile">
                            
                            <br/>
                                    <div class="Lcontainer">
                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <form id="register-form" data-action="insertPet" data-controller="home">
                                                <div class="form-group">
                                                    <h2>Register your Dog</h2>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupName">Dog Name</label>
                                                    <input id="dogname" name="dogname" type="text" maxlength="50" class="form-control">
                                                </div>
                                             
                                                <div class="form-group">
                                                    <label class="control-label" for="signupEmailagain">Dog Age</label>
                                                    <input id="dogage" name="dogage" type="text" maxlength="50" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupEmailagain">Dog Race</label>
                                                    <input id="dograce" name="dograce" type="text" maxlength="50" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupPassword">Dog Gender</label>
                                                     <input id="doggender" name="doggender" type="text" maxlength="50" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="signupPasswordagain">Dog Weight (Aprox*)</label>
                                                    <input id="dogweight" name="dogweight" type="text" maxlength="25" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button id="submit" type="submit" class="btn btn-info btn-block">Save</button>
                                                </div>
                                                <p class="form-group">You can add more dogs to your profil just go to profil or click <a href="#">Here</a> and our <a href="#">Privacy Policy</a>.</p>
                                                <hr>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    
                     <!--   <div role="tabpanel" class="tab-pane" id="messages">test3</div>
                        <div role="tabpanel" class="tab-pane" id="settings">test4</div> -->
                    
                    </div>