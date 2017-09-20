<?PHP
include 'include/header.php';
include 'include/sidebar.php';
include './bussapp.class.php';
$citydata=array();
if(isset($_GET['id'])){
    $city = new BusApp();
    $citydata = $city->getCityData($_GET['id']);
    //print_r($citydata);
}

//print_r($citydata);
?>
<div class="span9">
    <div class="content">        
        <div class="module">
            <div class="module-head">
                <h3>Add city</h3>
            </div>
            <div class="module-body">
                <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] != ''): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo $_SESSION['msg'];
                $_SESSION['msg'] = ''; ?></strong> 
                    </div>
                <?php endif; ?>
                <form class="form-horizontal row-fluid" method="post" id="addbus" name='addbus' action='bussapp.process.php'>
                    <input type="hidden" name='id' value="<?php echo isset($citydata[0])?$citydata[0]['cid']:0; ?>" />
                    <input type='hidden' name='type' value='<?php echo isset($citydata[0])?'editcity':'addcity'; ?>' />
                    <div class="control-group">
                        <label class="control-label" for="basicinput">City Name</label>
                        <div class="controls">
                            <input type="text" id="newcity" name='newcity' value='<?php echo isset($citydata[0])?$citydata[0]['cname']:''; ?>' placeholder="Enter City Name" class="span8">												
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Save</button>
                        </div>
                    </div>
                </form>							
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<?php
include 'include/footer.php';
?>