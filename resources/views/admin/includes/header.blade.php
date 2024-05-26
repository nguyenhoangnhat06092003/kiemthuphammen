<?php
$connect = mysqli_connect("localhost", "root", "", "restaurant-service");
$sql = "SELECT * FROM contact_sql";  
$sql1 = "SELECT count(*) as total FROM contact_sql";
$result = mysqli_query($connect, $sql);
$result1 = mysqli_query($connect, $sql1);

?>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('public/front-end/images/avt1.jpg') }}" alt="">Admin
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Thông tin cá nhân') }}
                            </a>
                        <a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Cài đặt</span>
                     </a>
        
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>
                            {{-- <form id="profile-form" action="{{ route('profile') }}" method="POST" style="display: none;">
                                @csrf
                            </form> --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <?php
     while($row1 = mysqli_fetch_array($result1))  
     {  
        echo ' 
                        <span class="badge bg-green">'.$row1["total"].'</span>
                        ';  
                    }
                    ?>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                        <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '            

                            <a class="dropdown-item">
                                
                                <span>
                                    <span>'.$row["UserName"].'</span>
                                    	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                                        &nbsp &nbsp &nbsp <span class="time">'.$row["contact"].'</span>
                                    </span 
                                </span>
                                <br> <span class="message"> '.$row["notes"].'
                                    </br></span>
                            </a>
                        </li>
                        ';  
                    }
                    ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
