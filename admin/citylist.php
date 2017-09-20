<?PHP
include 'include/header.php';
include 'include/sidebar.php';
include './bussapp.class.php';
$city = new BusApp();
$citydata = $city->getCityList();
//print_r($citydata);
?>
<div class="span9">
    <div class="content">        
        <div class="module">
            <div class="module-head">
                <h3 style="float: left">City List</h3>
                <a href="addcity.php" class="btn btn-primary pull-right">Add New City</a>
                <div class="clear" ></div>
            </div>
            <div class="module-body table">	
                <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] != ''): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo $_SESSION['msg'];
                $_SESSION['msg'] = '';
                    ?></strong>
                    </div>
<?php endif; ?>
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                       width="100%">
                    <thead>
                        <tr>
                            <th>
                                City Name
                            </th>                            
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>      
<?php for ($i = 0; $i < count($citydata); $i++): ?>
                            <tr class="gradeC">
                                <td>
    <?= $citydata[$i]['cname']; ?>
                                </td>
                                <td>
                                    <a href="addcity.php?id=<?= $citydata[$i]['cid'] ?>"><i class="icon-edit"></i></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="javascript:void(0);" id="<?= $citydata[$i]['cid'] ?>" class="deletecity" ><i  class="icon-trash"></i></a>
                                </td>                            
                            </tr>                                       
<?php endfor; ?>
                    </tbody>                    
                </table>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<?php
include 'include/footer.php';
?>
<script>
    $(".deletecity").click(function() {
        $.ajax({
            url: "bussapp.process.php",
            type: "post",
            data: {type: "deletecity", cid: $(this).attr('id')},            
            success: function(data) {
                if(data=='success'){
                    window.location.reload();
                }
            }
        });
    });
</script>