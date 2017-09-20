<?PHP 
include 'include/header.php';
include 'include/sidebar.php';
include './bussapp.class.php';
$city = new BusApp();
$busdata = $city->getBusesList();
?>
<div class="span9">
    <div class="content">        
        <div class="module">
            <div class="module-head">
                <h3 style="float: left">Buses List</h3>
                <a href="addNewBus.php" class="btn btn-primary pull-right">Add New Bus</a>
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
                            <th>Route Name</th>
                            <th>PickUp Time</th>
                            <th>Drop Time</th>
                            <th>Fare</th>
                            <th>Vacant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>         
                        <?php for($i=0;$i<count($busdata);$i++): ?>
                        <tr class="gradeC">
                            <td><?= $busdata[$i]['routefrom'].' To '.$busdata[$i]['routeto'].' '.$busdata[$i]['type']; ?></td>
                            <td><?= $busdata[$i]['rpickuptime']; ?></td>
                            <td><?= $busdata[$i]['rdroptime']; ?></td>
                            <td><?= $busdata[$i]['rfare']; ?></td>
                            <td><?= $busdata[$i]['rseat']; ?></td>
                            <td>
                                <a href="addNewBus.php?id=<?= $busdata[$i]['rid'] ?>"><i class="icon-edit"></i></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="javascript:void(0)" id="<?= $busdata[$i]['rid'] ?>" class="deletebus"><i class="icon-trash"></i></a></td>
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
    $(".deletebus").click(function() {
        $.ajax({
            url: "bussapp.process.php",
            type: "post",
            data: {type: "deletebus", rid: $(this).attr('id')},            
            success: function(data) {
                if(data=='success'){
                    window.location.reload();
                }
            }
        });
    });
</script>