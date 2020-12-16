<?php 
session_start();
include('../classes/Product.php');
if (!isset($_SESSION['id'])) {
  header("location: ../login.php");
} elseif(isset($_SESSION['id'])){
    if($_SESSION['is_admin'] == '0') {
        header("location:../index.php");
    }
}
$product = new Product();
$db = new Dbcon();
if(isset($_POST['submit'])) {
    $subcategory = $_POST['subcategory'];
    $insert = $product->insert_subcategory($subcategory, $db->conn);
}
if(isset($_GET['delete'])) {
  $id = $_GET['id'];
  $delete = $product->delete_subcategory($id, $db->conn);
}
?>
  
<?php include_once('header.php');?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Create Category</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header bg-transparent text-center">
              <h2 class="mb-0">Create Category</h2>
            </div>
            <div class="card-body">
                <form action="createcategory.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category</label>
                        <select class="form-control" name="category" id="category">
                            <?php 
                                $sql = $product->select_category($db->conn);
                                if($sql != 0) {
                                    foreach($sql as $item) {
                                        ?>
                                            <option value="<?php echo $item['id'];?>"><?php echo $item['prod_name'];?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Add SubCategory</label>
                        <input type="text" class="form-control" name="subcategory" pattern="^[a-zA-z][0-9a-zA-Z\.\ ]+[a-zA-z0-9]+$|^[a-zA-z][0-9a-zA-Z\ ]+$" id="subcategory" required placeholder="Add SubCategory">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">HTML</label>
                        <textarea id="editor" name="html"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id='submit' value="Add Category" name="submit">
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-lg-2"></div>
      </div>
      <!-- SubCategory Table -->
      <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="text-center card-header bg-primary border-0">
                    <h3 class="text-white mb-0">All SubCategory</h3>
                </div>
                <div class="table-responsive table-light">
              <table id="subcat" class="table align-items-center table-flush">
                <thead class="text-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Category</th>
                    <th scope="col" class="sort" data-sort="budget">SubCategory</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" class="sort" data-sort="completion">Launch Date</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                    $data = $product->select_subcategory($db->conn);
                    if($data == '0') {
                        ?>
                            <tr>
                                <td class="text-center">No data Available</td>
                            </tr>
                        <?php
                    } else {
                        foreach($data as $item) {
                            $parentname = $product->select_parentname($item['prod_parent_id'], $db->conn);
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                            if($parentname == '0') {
                                                echo "Null";
                                            } else {
                                                foreach($parentname as $pname) {
                                                    echo $pname['prod_name'];
                                                } 
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $item['prod_name']; ?></td>
                                    <td>
                                      <?php if($item['prod_available']=='1'){?> 
                                      <span class="badge badge-success">Available</span> <?php ;}
                                        else { 
                                          ?> <span class="badge badge-danger">Unavailable</span> <?php ; } ?></td>
                                    <td><?php echo $item['prod_launch_date']; ?></td>
                                    <td>
                                      <a onclick='return confirm("Are you sure, you want to Edit?")'  href="editcategory.php?update=1&id=<?php echo $item['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                      <a onclick='return confirm("Are you sure, you want to Delete?")'  href="createcategory.php?delete=1&id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }

                  ?>
                </tbody>
              </table>
            </div>
            </div>
        </div>
    </div>
     <script>
      function changeStatus($id) {
        $.ajax({
        method : "POST",
        url : "ajax.php",
        data : {id : $id }
      }).done(function(result){
        console.log(result);
      });
      }
     </script>
<?php include_once('footer.php');?>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
  selector: "textarea#editor",
  skin: "bootstrap",
  plugins: "lists, link, image, media",
  toolbar:
    "h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help",
  menubar: false,
  setup: (editor) => {
    // Apply the focus effect
    editor.on("init", () => {
      editor.getContainer().style.transition =
        "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
    });
    editor.on("focus", () => {
      (editor.getContainer().style.boxShadow =
        "0 0 0 .2rem rgba(0, 123, 255, .25)"),
        (editor.getContainer().style.borderColor = "#80bdff");
    });
    editor.on("blur", () => {
      (editor.getContainer().style.boxShadow = ""),
        (editor.getContainer().style.borderColor = "");
    });
  },
});
</script>

<script>
  $(function(){
    $('#subcat').dataTable()
  })
  </script>   
  <script>
      $(document).ready(function(){
        $("#subcategory").keyup(function(){
          subcategory=$("#subcategory").val()
          var regex = new RegExp('^[a-zA-z][0-9a-zA-Z\.\ ]+[a-zA-z0-9]+$|^[a-zA-z][0-9a-zA-Z\ ]+$/');
            if(regex.test(subcategory)) {
              $("#subcategory").css("border","2px solid green")
              $("#submit").removeAttr("disabled")
            }else{
              $("#subcategory").css("border","2px solid red")
              $("#submit").prop("disabled","true")
            }
          
        })
      })
    </script>

