<?PHP
include 'include/header.php';
include 'include/sidebar.php';
include './bussapp.class.php';
$city = new BusApp();
$citypa=array();
$citydata=$city->getCityList();
if(isset($_GET['id'])){    
    $citypa = $city->getCityPickData($_GET['id']);    
}

//print_r($citydata);
?>
<div class="span9">
    <div class="content">        
        <div class="module">
            <div class="module-head">
                <h3>Add city Pickup</h3>
            </div>
            <div class="module-body">
                <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] != ''): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo $_SESSION['msg'];
                $_SESSION['msg'] = ''; ?></strong> 
                    </div>
                <?php endif; ?>
                <form class="form-horizontal row-fluid" method="post" id="addcitypa" name='addcitypa' action='bussapp.process.php'>
                    <input type="hidden" name='id' value="<?php echo isset($citypa[0])?$citypa[0]['cid']:0; ?>" />
                    <input type='hidden' name='type' value='<?php echo isset($citypa[0])?'editcitypa':'addcitypa'; ?>' />
                    <div class="control-group">
                        <label class="control-label" for="basicinput">City Name</label>
                        <div class="controls">
                            <select name="cityid" id="cityid">
                                <option value="">Select City</option>
                                <?php foreach($citydata as $c): ?>
                                <option <?php if(isset($citypa[0])){if($citypa[0]['cid']==$c['cid']){ echo 'selected';}} ?> value="<?= $c['cid']; ?>"><?= $c['cname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">City Pickup Address</label>
                        <div class="controls">
                            <textarea name="address" id="address"><?php if(isset($citypa[0])){echo $citypa[0]['text'];} ?></textarea>
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