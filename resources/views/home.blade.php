@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger semitransparent">
                                    <div class="inner">
                                        <h5>0</h5>

                                        <p>New Orders</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3">
                                <!-- small box -->
                                <div class="small-box bg-success semitransparent">
                                    <div class="inner">
                                        <h5>100</h5>

                                        <p>Courses</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-th-large"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary semitransparent">
                                    <div class="inner">
                                        <h5>25</h5>

                                        <p>Instructors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-dark semitransparent">
                                    <div class="inner">
                                        <h5>65</h5>

                                        <p>Visitors Online</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <link rel='stylesheet'
                                      href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
                                <div class="card">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Recently Added Orders</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="products-list product-list-in-card pl-2 pr-2">
                                            <li class="item">
                                                <div class="product-img">
                                                    <img
                                                        src="https://appsrv1-147a1.kxcdn.com/adminlte/img/default-150x150.png"
                                                        alt="Product Image" class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">Samsung TV
                                                        <span class="badge badge-warning float-right">$1800</span></a>
                                                    <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                                                </div>
                                            </li>
                                            <!-- /.item -->
                                            <li class="item">
                                                <div class="product-img">
                                                    <img
                                                        src="https://appsrv1-147a1.kxcdn.com/adminlte/img/default-150x150.png"
                                                        alt="Product Image" class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">Bicycle
                                                        <span class="badge badge-info float-right">$700</span></a>
                                                    <span class="product-description">
                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                      </span>
                                                </div>
                                            </li>
                                            <!-- /.item -->
                                            <li class="item">
                                                <div class="product-img">
                                                    <img
                                                        src="https://appsrv1-147a1.kxcdn.com/adminlte/img/default-150x150.png"
                                                        alt="Product Image" class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">
                                                        Xbox One <span class="badge badge-danger float-right">
                        $350
                      </span>
                                                    </a>
                                                    <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <a href="javascript:void(0)" class="uppercase">View All Orders</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Latest Members</h3>

                                        <div class="card-tools">
                                            <span class="badge badge-danger">8 New Members</span>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="users-list clearfix">
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user1-128x128.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">Alexander Pierce</a>
                                                <span class="users-list-date">Today</span>
                                            </li>
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user8-128x128.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">Norman</a>
                                                <span class="users-list-date">Yesterday</span>
                                            </li>
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user7-128x128.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">Jane</a>
                                                <span class="users-list-date">12 Jan</span>
                                            </li>
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user6-128x128.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">John</a>
                                                <span class="users-list-date">12 Jan</span>
                                            </li>
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user2-160x160.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">Alexander</a>
                                                <span class="users-list-date">13 Jan</span>
                                            </li>
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user5-128x128.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">Sarah</a>
                                                <span class="users-list-date">14 Jan</span>
                                            </li>
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user4-128x128.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">Nora</a>
                                                <span class="users-list-date">15 Jan</span>
                                            </li>
                                            <li>
                                                <img
                                                    src="https://appsrv1-147a1.kxcdn.com/adminlte/img/user3-128x128.jpg"
                                                    alt="User Image">
                                                <a class="users-list-name" href="#">Nadia</a>
                                                <span class="users-list-date">15 Jan</span>
                                            </li>
                                        </ul>
                                        <!-- /.users-list -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <a href="javascript:">View All Users</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>





                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @parent
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events = {!! json_encode($events??[]) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,
                header: {
                    right: 'month,agendaWeek, prev,next today'
                },


            })
        });
    </script>
@endsection
