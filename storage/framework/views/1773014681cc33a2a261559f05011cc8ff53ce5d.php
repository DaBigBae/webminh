<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>WS</b>m</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>WS</b> management</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                    
                        
                        
                    
                    
                        
                        
                            
                            
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                            
                                        
                                        
                                    
                                
                                
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                            
                                        
                                        
                                    
                                
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                            
                                        
                                        
                                    
                                
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                            
                                        
                                        
                                    
                                
                                
                                    
                                        
                                            
                                        
                                        
                                            
                                            
                                        
                                        
                                    
                                
                            
                        
                        
                    
                
                
                
                    
                        
                        
                    
                    
                        
                        
                            
                            
                                
                                    
                                        
                                    
                                
                                
                                    
                                        
                                        
                                    
                                
                                
                                    
                                        
                                    
                                
                                
                                    
                                        
                                    
                                
                                
                                    
                                        
                                    
                                
                            
                        
                        
                    
                
                
                
                    
                        
                        
                    
                    
                        
                        
                            
                            
                                
                                    
                                        
                                            
                                            
                                        
                                        
                                            
                                                 
                                                
                                            
                                        
                                    
                                
                                
                                
                                    
                                        
                                            
                                            
                                        
                                        
                                            
                                                 
                                                
                                            
                                        
                                    
                                
                                
                                
                                    
                                        
                                            
                                            
                                        
                                        
                                            
                                                 
                                                
                                            
                                        
                                    
                                
                                
                                
                                    
                                        
                                            
                                            
                                        
                                        
                                            
                                                 
                                                
                                            
                                        
                                    
                                
                                
                            
                        
                        
                            
                        
                    
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(Auth::guard('admin')->user()->img); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo e(Auth::guard('admin')->user()->name); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo e(Auth::guard('admin')->user()->img); ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo e(Auth::guard('admin')->user()->name); ?> - <?php if(Auth::guard('admin')->user()->role == 0): ?>Admin <?php else: ?> Employee <?php endif; ?>
                                <small>Member since April. 2019</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                            
                                
                                    
                                
                                
                                    
                                
                                
                                    
                                
                            
                            
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>