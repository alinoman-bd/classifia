 		<style>
 			.extra-info2 .user-con .row {
 				align-items: initial;
 			}
 		</style>
 		<div class="extra-info2">
 			<div class="row mar-0"> 
 				<div class="col-12">
 					<div class="reg-menu">
 						<span class="reg-li active">Non-register user</span>
 						<span class="reg-li">Register user</span>
 					</div>
 				</div>
 				<div class="col-12 pad-0">
 					<div class="menu-nav-cnt">
 						@include('frontend.category.user-action.user-contact-info-for-job')
 						<div class="menu-cnt d-none">
 							
 							<div class="row mar-0"> 
 								<div class="col-md-4">
 									<div class="form-group">
 										<label for="inputAddress">Email & phone</label>
 										<input type="email"  id="lgEmail" class="form-control search-i @error('email') is-invalid @enderror">
 									</div>
 									@error('email')
 									<span class="invalid-feedback" role="alert">
 										<strong>{{ $message }}</strong>
 									</span>
 									@enderror
 								</div>
 								<div class="col-md-4">
 									<div class="form-group">
 										<label for="inputAddress">Password</label>
 										<input type="password" id="lgPass"  class="form-control  search-i @error('password') is-invalid @enderror lpass" >
 									</div>
 									@error('password')
 									<span class="invalid-feedback" role="alert">
 										<strong>{{ $message }}</strong>
 									</span>
 									@enderror
 								</div>
 								<div class="please">
 									<img src="{{ asset('assets/img/please-wait.gif') }}" alt="">
 								</div>
 								<div class="col-md-3">
 									<span class="btn ctm-btn next-btn log-p" onclick="loginInformPage()" >Login</span>
 								</div>
 							</div>
 							<div class="try-again">The Given Credentials were not matched with our record! Please try with exact Credentials!</div>
 							<!-- <div class="col-12">
 								<div class="s-l-btn">
 									<div><a href="">sign up</a> </div>
 									<div><a href="">password reminder</a></div>
 								</div>
 							</div> -->
 						</div>
 					</div>
 				</div>
 				<div class="col-12">
 					<button class="btn ctm-btn next-btn" form="jobform" type="submit">Next</button>
 				</div>
 			</div>
 		</div>