<?php
  include'all.php';
?>

<style>
  .bg-title{
    background: rgba(60,141,188,1);
    background: -moz-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 59%, rgba(80,161,208,1) 97%, rgba(80,161,208,1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(60,141,188,1)), color-stop(0%, rgba(60,141,188,1)), color-stop(59%, rgba(60,141,188,1)), color-stop(97%, rgba(80,161,208,1)), color-stop(100%, rgba(80,161,208,1)));
    background: -webkit-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 59%, rgba(80,161,208,1) 97%, rgba(80,161,208,1) 100%);
    background: -o-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 59%, rgba(80,161,208,1) 97%, rgba(80,161,208,1) 100%);
    background: -ms-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 59%, rgba(80,161,208,1) 97%, rgba(80,161,208,1) 100%);
    background: linear-gradient(to right, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 59%, rgba(80,161,208,1) 97%, rgba(80,161,208,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dd4b39', endColorstr='#f16f5c', GradientType=1 );
  }

  .bg-title2{
    background: rgba(60,141,188,1);
    background: -moz-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 27%, rgba(80,161,208,1) 90%, rgba(80,161,208,1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(60,141,188,1)), color-stop(0%, rgba(60,141,188,1)), color-stop(27%, rgba(60,141,188,1)), color-stop(90%, rgba(80,161,208,1)), color-stop(100%, rgba(80,161,208,1)));
    background: -webkit-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 27%, rgba(80,161,208,1) 90%, rgba(80,161,208,1) 100%);
    background: -o-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 27%, rgba(80,161,208,1) 90%, rgba(80,161,208,1) 100%);
    background: -ms-linear-gradient(left, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 0%, rgba(60,141,188,1) 27%, rgba(80,161,208,1) 90%, rgba(80,161,208,1) 100%);
  }

  @media only screen and (max-width: 990px) {
    .pm, .pro-box{
      border-bottom:solid 1px silver;
      padding-bottom: 10px;
    }

    .boxzol{
      margin-bottom:20px;
    }

    .forum{
      margin-left:5px;
      margin-right:5px;
    }

    .forum2{
      margin-left:5px;
      margin-right:5px;
    }

    .topinfo{
      margin-left:2px;
      margin-right:2px;
    }
  }
  @media only screen and (min-width: 990px) {
    .pm{
      border-right:solid 1px silver;
      border-left:solid 1px silver;
    }

    .boxzol{
      margin-bottom:10px;
    }

    .topinfo{
      margin-left:10px;
      margin-right:10px;

    }

    .forum2{
      padding-left: 0px;
    }
  }
</style>

<!-- Content Wrapper. Contains page content -->
<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
      $user_id=$_GET['id'];
      $query="SELECT * FROM login WHERE id='".$user_id."'";
      $query_run=mysqli_query($con,$query);
      $rows=mysqli_fetch_assoc($query_run);
    }
?>
  

  <div class="content-wrapper" style="background-image:url('images/backgrounds/1.jpg');padding-bottom:2%;background-repeat: no-repeat;background-size: cover;">
    <div class="row" style="margin:0 3%;"></div>
    <div class="row topinfo">
      <div class="col-md-12">
            <h2 class="box-title" style="font-size:22px;color:white;"><?php echo $rows["firstname"].' '.$rows["surname"];?>'s Profile</h2>
          <!-- /.box-header -->
		     <div class="col-md-6 pro-box" style="float:left">
                <h3 class="text-center" style="font-size:20px;margin-top:10px; color:white"><b><?php echo $rows["firstname"].' '.$rows["surname"];?></b></h3>
                <div class="profile-picture text-center" >
                  <img src="images/users/<?php
                  if(file_exists('images/users/'.$user_id.'.jpg'))
                  {
                    echo $user_id;
                  }
                  else
                  {
                    echo 'default';
                  }
                  ?>.jpg" class="img-circle" width="160" height="160">
                  <?php
                  if(!empty($_GET["id"]) && isset($_GET["id"]))
                  {
                  ?>
                    <br>
                    <button style="padding:;background:green;color:white;;margin-top:10px;" id="button<?php echo $user_id;?>" onclick="followinc(this.id);">
                      <?php
                      $u_id=$_GET['id'];
                      $queryf="SELECT * FROM login WHERE id='$u_id'";
                      $queryf_run=mysqli_query($con,$queryf);
                      $queryf_array=mysqli_fetch_assoc($queryf_run);
                      $follow=$queryf_array['follow'];
                      $x= explode(',',$follow);
                      $flag=0;
                      foreach($x as $x_a)
                      {
                        if($x_a==$_SESSION['user_id']){
                          echo 'Following';
                          $flag=1;
                          break;
                        }
                      }
                      if($flag==0)
                      {
                        echo 'Follow';
                      }
                      ?>
                    </button>
                    <?php
                  }
                  ?>
                </div>
              </div>
          
              <!-- /.col -->
              <!-- /.col -->
			  <div class="col-md-12" style="display:flex">
              <div class="pm col-md-5" style="display:flex; padding-left:15%; padding-right:5%">
                <div class="pmi profile-info" style="font-size: 15px; color:white">
                  <h4 class="pmh text-center visible-md visible-lg" style="font-size:20px;"><b>Personal Memoronda</b></h4><br>
                  <span style="font-size:16px;"><b style="font-color:white">Name:</b></span><span style="font-size:16px;"><?php echo $rows["firstname"].' '.$rows["surname"];?></span><br>
                  <span style="font-size:16px;"><b>Email ID:</b></span><span style="font-size:16px;"><?php echo $rows["email"];?></span><br>
                  <?php if($user_type==2){?><span style="font-size:16px;"><b>Regno:</b></span><span style="font-size:16px;"><?php echo $rows["Regid"];?></span><br><?php }?>
                  <span style="font-size:16px;"><b>Gender:</b></span><span style="font-size:16px;"><?php echo $rows["gender"];?></span><br>
                  <span style="font-size:16px;"><b>Birth Date:</b></span><span style="font-size:16px;"><?php echo date("d M Y",strtotime($rows["dob"]));?></span><br>
                  <span style="font-size:16px;"><b>Date of joining:</b></span><span style="font-size:16px;"><?php echo date("M Y",strtotime($rows['doj']));?></span><br>
                </div>
              </div>
			
                            <!-- /.col -->
              <h3 class="pmh text-center visible-sm visible-xs" style="font-size:20px;"><b>Personal Details</b></h3>
              <div class="pm col-md-12" style="display:flex; padding-left:10%; font-size: 15px; color:white">
                <div class="pmi profile-info" >
                  <span style="font-size:16px;"><b>Aadhar card:</b></span><span style="font-size:16px;"><?php echo $rows["aadharno"];?></span><br>
                  <span style="font-size:16px;"><b>Father's Name:</b></span><span style="font-size:16px;"><?php echo $rows["fname"];?></span><br>
                  <?php if($user_type==2){?><span style="font-size:16px;"><b>Regno:</b></span><span style="font-size:16px;"><?php echo $rows["Regid"];?></span><br><?php }?>
                  <span style="font-size:16px;"><b>Mother's Name:</b></span><span style="font-size:16px;"><?php echo $rows["mname"];?></span><br>
                  <span style="font-size:16px;"><b>occupation:</b></span><span style="font-size:16px;"><?php echo $rows["occupation"];?></span><br>
                  <span style="font-size:16px;"><b>Sibling(If any):</b></span><span style="font-size:16px;"><?php echo $rows["sibling"];?></span><br>
                  <span style="font-size:16px;"><b>Educational Institute</b></span><span style="font-size:16px;"><?php echo $rows["institute"];?></span><br>
                  <span style="font-size:16px;"><b>Current Education</b></span><span style="font-size:16px;"><?php echo $rows["typeedu"];?></span><br>
                  <span style="font-size:16px;"><b>Course to Pursue:</b></span><span style="font-size:16px;"><?php echo $rows["Course to pursue"];?></span>
                  <span style="font-size:16px;"><b>Previous year's result:</b></span><span style="font-size:16px;"><?php echo $rows["result"];?></span><br>
                  <span style="font-size:16px;"><b>Amount Required:</b></span><span style="font-size:16px;"><?php echo $rows["amount"];?></span><br><br><br>

				</div>
				</div>
				</div>
                  
                     <div class="btn-group" style="">
  
                  <button type="button" class="btn btn-primary" id="adhar">Aadhar Card</button>

                  <button type="button" class="btn btn-primary" id="income">Income Certificate</button>
                
                  <button type="button" class="btn btn-primary" id="ration">Ration Card</button>
                  <button type="button" class="btn btn-primary" id="academic">Academic proof</button>
                        
                      
                  
                  </div>
                </div>
              </div>
              

            
          <!-- /.box-footer -->
        
        <!-- /.box -->
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
<script type="text/javascript">
var btn1 = document.getElementById('adhar');
btn.addEventListener('click', function() {
  document.location.href = '#';
});
var btn2 = document.getElementById('income');
btn.addEventListener('click', function() {
  document.location.href = '#';
});
var btn3 = document.getElementById('ration');
btn.addEventListener('click', function() {
  document.location.href = '#';
});
var btn4 = document.getElementById('academic');
btn.addEventListener('click', function() {
  document.location.href = '#';
});
</script>
    <!-- Main row -->
    <div class="row" style="margin:10px -7px; ">
      <!-- Left col -->



    <!-- /.row -->
    <?php
      $queryus="SELECT type FROM login WHERE id='".$user_id."'";
      $query_runus=mysqli_query($con,$queryus);
      $rowus=mysqli_fetch_assoc($query_runus);
      if($rowus['type']==3)
      {
    ?>
  <div class="row">

      <div class="col-md-7 col-md-offset-1 forum">
        <!-- Info Boxes Style 2 -->

        <!-- PRODUCT LIST -->
        <div class="box box-primary" style="border-top-color:#d2d6de;">
          <div class="box-header with-border bg-title" style="">
            <h3 class="box-title" style="color:white;">Medicines by  <?php echo $rows["firstname"].' '.$rows["surname"];?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <?php
              $content= file_get_contents("http://127.0.0.1/ss/quickstart.php");
              $content1=explode("/",$content);
              foreach($content1 as $temp)
              {
                $content2=explode(",",$temp);
                if(@$content2[3]==$user_id)
                {
                    $query="SELECT * FROM login WHERE id='".$content2[3]."'";
                    $query_run=mysqli_query($con,$query);
                    $mrow=mysqli_fetch_assoc($query_run);
                ?>
                <li class="item">
                  <div>
                    <div class="product-img">
                      <img src="Tablet.png" style="width:75px;height:75px;" alt="Product Image">
                    </div>
                    <div class="product-info" style="margin-left:90px;">
                      <a href="" class="product-title" style="font-size:16px;"><?php echo $content2[0]; ?>
                        <span class="label pull-right " style="color:#999999;"><?php echo 'Available'; ?></span>
                      </a>
                      <span class="product-description">
                        <?php echo 'Seller: Ch. '.$mrow['firstname'].' '.$mrow['surname']; ?>
                      </span>
                    </div>
                  </div>
                  <br><br><span style="margin-left:10px;margin-top:3px;font-size:16px;" class="label label-success pull-left"><?php echo $content2[1];?> Pcs</span>&nbsp
                    <span style="margin-left:10px;margin-top:3px;font-size:16px;margin-left:5px" class="label label-danger pull-left"><?php echo $content2[2];?> Rs</span>
                </li>
                <?php
              }
            }
              ?>
              <!-- /.item -->
            </ul>
          </div>
          <!-- /.box-body -->

          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
  </div>
  <?php
}
  ?>


  <?php
    $queryus="SELECT type FROM login WHERE id='".$_SESSION['user_id']."'";
    $query_runus=mysqli_query($con,$queryus);
    $rowus=mysqli_fetch_assoc($query_runus);
    if($rowus['type']==$rowus['type'])
    {
  ?>

        <!-- /.box-body -->

    </div>
</div>
<?php
}
?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
}else
{
  echo '<script type="text/javascript">';
  echo 'window.location.href="login.php";';
  echo '</script>';
}
?>
<?php
include'footer.php';

?>
