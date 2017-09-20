<?PHP 
include 'include/header.php';
include 'include/sidebar.php';
include './bussapp.class.php';
$citypa = new BusApp();
$cid=  isset($_GET['id'])?$_GET['id']:'';
$citypadata=$citypa->getCityPickup($cid);
?>
<div class="span9">
    <div class="content">        
        <div class="module">
            <div class="module-head">
                <h3 style="float: left">City PickUp List</h3>                
                <a href="addpickup.php" class="btn btn-primary pull-right">Add New Pickup Address</a>
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
                                city Name
                            </th>
                            <th>
                                City Address
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php if(count($citypadata)>0):
                            foreach ($citypadata as $cpa):    
                        ?>                        
                        <tr class="gradeC">
                            <td>
                                <?= $cpa['city']; ?>
                            </td>
                            <td>
                                <?= $cpa['text']; ?>
                            </td>     
                            <td>
                                <a href="addpickup.php?id=<?= $cpa['paid'] ?>"><i class="icon-edit"></i></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="javascript:void(0);" id="<?= $cpa['paid'] ?>" class="deletepa" ><i  class="icon-trash"></i></a>
                            </td>
                        </tr>
                        <?php 
                        endforeach;
                    endif;
                        ?>
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
    $(".deletepa").click(function() {
        $.ajax({
            url: "bussapp.process.php",
            type: "post",
            data: {type: "deleteaddress", id: $(this).attr('id')},            
            success: function(data) {
                if(data=='success'){
                    window.location.reload();
                }
            }
        });
    });
</script>