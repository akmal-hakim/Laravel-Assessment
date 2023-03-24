<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        @include('sidebar')
        
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" >

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle"  id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                {{-- <div class="container-fluid" style="position: fixed; height:auto; width:auto"> --}}
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="m-0 font-weight-bold text-primary">Companies</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-right">
                                                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="/addcompany" >
                                                    Add New Company
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="overflow-y: scroll;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Website</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Website</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            <tbody>
                                                @foreach ($company as $item)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('/imageUpload/'.$item->src_pic) }}" width="70px" height="70px" alt="image">
                                                            {{ $item->name }}
                                                        </td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->website }}</td>
                                                        
                                                        <td class="text-center">

                                                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{ $item->id }}">Update</button>
                                                            <form action="{{ url('/deletecompany/'. $item->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn btn-danger btn-user btn-block">Delete</button>
                                                            </form>

                                                        </td>
                                                        
                                                    </tr>
                                                    <!---------------------------------------------- Update Price Modal ---------------------------------------------->
                                                    <div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ url('/updateCompanyContent/'.$item->id) }}" method="post">
                                                                        @csrf

                                                                        <div class="form-group row">
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control form-control-user" name="name" id="name" value="{{$item->name}}"
                                                                                    placeholder="Name..." required>
                                                                                @if($errors->any())
                                                                                    <p style="color:red;">{{$errors->first('name')}}</p>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <input type="email" class="form-control form-control-user" name="email" id="email" value="{{$item->email}}"
                                                                                    placeholder="Email..." required>
                                                                                @if($errors->any())
                                                                                    <p style="color:red;">{{$errors->first('email')}}</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-sm-6">
                                                                                <input type="file" name="src_pic" id="src_pic" class="form-control form-control-user" value="{{$item->src_pic}}" required>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control form-control-user" name="website" id="website" value="{{$item->website}}"
                                                                                    placeholder="Website Name..." required>
                                                                                @if($errors->any())
                                                                                    <p style="color:red;">{{$errors->first('website')}}</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-sm-6">
                                                                                <img src="{{ asset('/imageUpload/'.$item->src_pic) }}" width="200px" height="200px" alt="image">
                                                                            </div>
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                                            Update
                                                                        </button>

                                                                    </form>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            @if($errors->any())
                                                <h4 style="color:red;">{{$errors->first()}}</h4>
                                            @endif
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        function deleteNotify(){
            var txt;
            if (confirm("Are you sure to delete?!")) {
            return true;
            } else {
            return false;
            }
        }
    </script>

</body>

</html>
