<?php
   include'all.php';
?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style>
    .li-hover:hover{

    }
    .bg-title{
      background: rgba(221,75,57,1);
      background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(59%, rgba(221,75,57,1)), color-stop(97%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
      background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: linear-gradient(to right, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dd4b39', endColorstr='#f16f5c', GradientType=1 );
    }

    .bg-title2{
      background: rgba(221,75,57,1);
      background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(27%, rgba(221,75,57,1)), color-stop(90%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
      background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
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

  <div class="content-wrapper">
    <section class="content">
      <?php
      if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
      {
          $name=@$_FILES['file']['name'];
          $tmp_name=@$_FILES['file']['tmp_name'];
          $size=@$_FILES['file']['size'];
          $type=@$_FILES['file']['type'];
          $extension=strtolower(substr($name,strpos($name,'.')+1));

           if(isset($name))
            {
              if(!empty($name))
          	{
          	   $location="images/files/";
               if (file_exists($location.$user_id.'/'))
               {

               }
               else
               {
               mkdir("images/files/".$user_id);
          	   }
               if(($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($type=='image/jpeg' || $type=='image/png'))
               {
                if(file_exists($location.$user_id.'/'.$name))
                {
                    echo '<script>alert("error")</script>';
                }
                else
                {

                     if(move_uploaded_file($tmp_name,$location.$user_id.'/'.$name))
          		   {
          		   	$im=$location.$name.'.jpg';
          			@$im_size=getimagesize($im);
          			$im_width=$im_size[0];
          			$im_height=$im_size[1];
          			@$new_size=($im_width+$im_height)/($im_width*($im_height/100));
          			$new_width=$im_width*$new_size;
          			$new_height=$im_height*$new_size;
          			@$new_image=imagecreatetruecolor($new_width,$new_height);
          			@$old_image=imagecreatefromjpeg($im);
          			@imagecopyresized($new_image,$old_image,0,0,0,0,$new_width,$new_height,$im_width,$im_height);
          			@imagejpeg($new_image,$location1.$name.'.jpg');

          		   $url='main_forum.php';

          		   }
          		    else
          		    {
          		    echo '<b style="color:red;">&nbsp error in uploading</b>';
          		    }
                }
                   }
          		  else
          		  {
                    echo '<b style="color:red;">&nbsp Please Upload jpeg/jpg/png file and below 100kb</b>';
                    }
              }
          	 else
               {
               echo '<b style="color:red;">&nbsp Please Upload file</b>';
               }
            }
             else
             {
                 echo '<b style="color:red;">&nbsp Please Select File</b>';
             }
      ?>
    <div class="row" style="background-color:#ecf0f5;height:5px;">

    </div>

      <!-- Main row -->

      <!-- /.row -->
      <div class="row" style="margin:10px -7px; ">
        <!-- Left col -->

        <!-- /.col -->

        <div class="col-md-7 col-md-offset-1 forum">
          <!-- Info Boxes Style 2 -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary" style="border-top-color:#d2d6de;">
            <div class="box-header with-border bg-title" style="">
              <h3 class="box-title" style="color:white;">Upload Photo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
            <form class="form-horizontal" id="form1" name="form1" method="post" action="file_upload.php" enctype="multipart/form-data">
              <div class="box-body">
                  <div class="form-group">
                        <label for="exampleInputFile">Upload Forum Photo</label>
                        <input id="exampleInputFile" name="file" type="file">
                        <p class="help-block">Upload your file here.</p>
                        <table class="table table-striped">
                        <?php
                        $directory = "images/files/";
                          $images = glob($directory.$user_id."/*.*");
                          foreach($images as $image){
                            echo '
                            <tr>
                            <td>
                              <img src="'.$image.'" height="100px" width="100px" role="button"   data-toggle="modal" data-target="#exampleModal"/><br><br>
                              <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h3 class="modal-title">Your Report</h3>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p><img src="'.$image.'" height="100%" width="100%"/></p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
<<<<<<< HEAD
                            </tr>';
=======
							</tr>';
>>>>>>> 6b7c57549392848fd90c9fb705360cb495925710
                          }

                        ?>
                        </table>
                  </div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a href="profile.php"><button type="button" class="btn btn-default">Skip this Step</button></a>
                <button type="submit" value="upload" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form
              </div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.row -->
      <?php
      }
      else {

      }

      ?>
      <br>
      <br>
      <br>
      <br>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
   include'footer.php';

?>
