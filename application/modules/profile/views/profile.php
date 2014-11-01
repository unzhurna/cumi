
<div class="widgetcontent bordered">
                	<div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	
                            
                            <div class="profilethumb">
                            	<a href="">Change Thumbnail</a>
                                <img class="img-polaroid" alt="" src="<?php echo config_item('assets'); ?>img/profilethumb.png">
                            </div><!--profilethumb-->
                            
                            
                            <h4>Tags</h4>
                            
                            <ul class="taglist">
                            	<li><a href="">HTML5 <span class="icon-remove"></span></a></li>
                                <li><a href="">CSS <span class="icon-remove"></span></a></li>
                                <li><a href="">PHP <span class="icon-remove"></span></a></li>
                                <li><a href="">jQuery <span class="icon-remove"></span></a></li>
                                <li><a href="">Java <span class="icon-remove"></span></a></li>
                                <li><a href="">GWT <span class="icon-remove"></span></a></li>
                                <li><a href="">CodeNgniter <span class="icon-remove"></span></a></li>
                                <li><a href="">Bootstrap <span class="icon-remove"></span></a></li>
                            </ul>
                            <a style="display:block;margin-top:10px" href="">+ Add Tag</a>
                            
                        </div><!--span3-->
                        <div class="span9">
                            <form method="post" class="editprofileform" action="http://demo.themepixels.com/webpage/katniss/editprofile.html">
                            	<h4>Login Information</h4>
                                <p>
                                	<label>Username:</label>
                                	<input type="text" value="themepixels" class="input-xlarge" name="username">
                                </p>
                                <p>
                                	<label>Email:</label>
                                    <input type="text" value="you@yourdomain.com" class="input-xlarge" name="email">
                                </p>
                                <p>
                                	<label style="padding:0">Password</label>
                                    <a href="">Change Password?</a>
                                </p>
                                
                                <br>
                                
                                <h4>Personal Information</h4>
                                <p>
                                	<label>Firstname:</label>
                                	<input type="text" value="Theme" class="input-xlarge" name="firstname">
                                </p>
                                <p>
                                	<label>Lastname:</label>
                                    <input type="text" value="Pixels" class="input-xlarge" name="lastname">
                                </p>
                                <p>
                                	<label>Location:</label>
                                    <input type="text" value="Cebu, Philippines" class="input-xlarge" name="location">
                                </p>
                                <p>
                                	<label>Your Website:</label>
                                    <input type="text" value="http://themepixels.com/" class="input-xlarge" name="website">
                                </p>
                                <p>
                                	<label>About You:</label>
                                    <textarea class="span8" name="about"></textarea>
                                </p>
                                
                                <br>
                                
                                <h4>Notifications</h4>
                                <p>
                                	<input type="checkbox"> Email me when someone mentions me... <br>
                                	<input type="checkbox"> Email me when someone follows me...
                                </p>
                                
                                <br>
                                <p>
                                	<button class="btn btn-primary" type="submit">Update Profile</button> &nbsp; <a href="">Deactivate your account</a>
                                </p>
                            </form>
                        </div><!--span9-->
                    </div><!--row-fluid-->
                </div>