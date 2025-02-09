<nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                <?php
                  $result=mysqli_query($conn,"select * from notifications where email='$user_email' and status=0 ");
                  $qr=mysqli_num_rows($result);

                  echo $qr;

                ?>
              </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>




              <div style="height: max-content;" class="dropdown-list-content dropdown-list-message">
                <?php $query=mysqli_query($conn,"select * from notifications where email='$user_email' and status=0 ");
                  while($result = $query->fetch_assoc()){
    
                    $not = $result['message'];
                    $det = $result['date'];
      
                    echo '
                    <a href="#" class="dropdown-item"> 
                    <span class="dropdown-item-avatar text-white"> 
                      <img alt="image" src="'.$system_logo.'" class="rounded-circle">
                    </span> 
                    <span class="dropdown-item-desc"> 
                      <span class="message-user">
                        '.$system_name.' Admin
                      </span>
                      <span class="time messege-text">
                        '.$not.'
                      </span>
                      <span class="time">
                        On '.$det.'
                      </span>
                    </span>
                  </a>     
                      
                    ';     
      
          
                  }   
                  ?>
                


              </div>
            </div>
          </li>



          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
              <span class="badge headerBadge2">
              <?php
                $resul=mysqli_query($conn,"select * from reports where email='$user_email' and status=0 ");
                $qrr=mysqli_num_rows($resul);

                echo $qrr;

              ?>             

              </span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>


              <div style="height: max-content; max-height:10em;" class="dropdown-list-content dropdown-list-icons">
              
              
              <?php $query=mysqli_query($conn,"select * from reports where email='$user_email' and status=0 ");
                  $count=1;
                  while($resu=mysqli_fetch_array($query)){
                  ?>
                <a href="#" class="dropdown-item"> 
                  <span class="dropdown-item-icon bg-info text-white"> 
                    <i class="fas fa-bell"></i>
                  </span> 
                  <span class="dropdown-item-desc"> 
                    <?php echo $resu['message'] ?> 
                    <span class="time">
                      On <?php echo $resu['date'] ?> 
                    </span>
                  </span>
                </a>
                
              <?php $count++;} ?>   
              </div>
            </div>


          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo $_SESSION['logo']; ?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $_SESSION['user_name']; ?></div>
              <a href="profile.php?action=settings_profile&&name=<?php echo $_SESSION['fname']; ?>" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php?action=logout&&name=<?php echo $_SESSION['fname']; ?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>