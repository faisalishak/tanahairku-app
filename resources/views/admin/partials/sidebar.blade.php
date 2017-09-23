<div class="sidebar">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <img src="{{asset('assets/img/logo-white.png')}}" width="120px" style="padding: 20px 0px;"/>
            </div>

            <ul class="nav">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}" >
                    <a href="{{url('/admin/dashboard')}}">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/code') ? 'active' : ''}}">
                    <a href="{{url('/admin/code')}}">
                        <p>Unique Code</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/product') ? 'active' : ''}}">
                    <a href="{{url('/admin/product')}}">
                        <p>Product</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/pesanan') ? 'active' : ''}}">
                    <a href="{{url('/admin/pesanan')}}">
                        <p>Orders</p>
                    </a>
                </li>
                <!--<li>
                    <a href="{{url('/admin/video')}}">
                        <p>Video</p>
                    </a>
                </li>-->
                <li class="{{ Request::is('admin/registered') ? 'active' : ''}}">
                    <a href="{{url('/admin/registered')}}">
                        <p>Registered</p>
                    </a>
                </li> 
                
               <li>
                                                        <a href="{{url('/admin/log/cluster')}}">
                                                            <p>Customer CLuster</p>
                                                        </a>
                                                    </li>
                                                    <li >
                                                        <a href="{{url('/admin/log/marker/category')}}">
                                                            <p>A. Rule Category</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('/admin/log/marker/object')}}">
                                                            <p>A. Rule Object</p>
                                                        </a>
                                                    </li>
            </ul>
    	</div>
    </div>
