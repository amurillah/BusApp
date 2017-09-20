<?PHP
include 'include/header.php';
include 'include/sidebar.php';
include './bussapp.class.php';
$bus = new BusApp();
$citydata = $bus->getCityList();
$bustype = $bus->getBusTypes();

$busdata=array();
if(isset($_GET['id'])){    
    $busdata = $bus->getRoutsData($_GET['id']);    
    //print_r($busdata);
}
?>
<div class="span9">
    <div class="content">        
        <div class="module">
            <div class="module-head">
                <h3>Add Bus</h3>
            </div>
            <div class="module-body">
                <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] != ''): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php
                            echo $_SESSION['msg'];
                            $_SESSION['msg'] = '';
                            ?></strong> 
                    </div>
                <?php endif; ?>
                <form class="form-horizontal row-fluid" method="post" id="addnewbus" name='addnewbus' action='bussapp.process.php'>
                    <input type="hidden" name='id' value="<?php echo isset($busdata[0])?$busdata[0]['rid']:'0'; ?>" />
                    <input type='hidden' name='type' value="<?php echo isset($busdata[0])?'editbus':'addnewbus'; ?>" />                     
                    <div class="control-group">
                        <label class="control-label">From City Name</label>
                        <div class="controls">
                            <select tabindex="1" id="fromcity" name="fromcity" data-placeholder="Select here.." class="span8">
                                <option value="">Select From City</option>
                                <?php foreach($citydata as $c): ?>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rfrom']==$c['cid']){ echo 'selected';}} ?> value="<?= $c['cid']; ?>"><?= $c['cname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">To City Name</label>
                        <div class="controls">
                            <select tabindex="1" id="tocity" name="tocity" data-placeholder="Select here.." class="span8">
                                <option value="">Select To City</option>                                
                                <?php foreach($citydata as $c): ?>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rto']==$c['cid']){ echo 'selected';}} ?> value="<?= $c['cid']; ?>"><?= $c['cname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Bus Type</label>
                        <div class="controls">
                            <select tabindex="1" id="bustype" name="bustype" data-placeholder="Select here.." class="span8">
                                <option value="">Select Bus Types</option>
                                <?php foreach($bustype as $bt): ?>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rbtype']==$bt['btid']){ echo 'selected';}} ?> value="<?= $bt['btid']; ?>"><?= $bt['btname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Bus Route</label>
                        <div class="controls">
                            <select tabindex="1" id="busroute" name="busroute" data-placeholder="Select here.." class="span8">
                                <option value="">Select Route</option>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='daily'){ echo 'selected';}} ?> value="daily">Daily</option>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='sunday'){ echo 'selected';}} ?> value="sunday">Sunday</option>
                                <option  <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='monday'){ echo 'selected';}} ?> value="monday">Monday</option>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='tuesday'){ echo 'selected';}} ?> value="tuesday">Tuesday</option>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='wednesday'){ echo 'selected';}} ?> value="wednesday">Wednesday</option>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='thursday'){ echo 'selected';}} ?> value="thursday">Thursday</option>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='friday'){ echo 'selected';}} ?> value="friday">Friday</option>
                                <option <?php if(isset($busdata[0])){if($busdata[0]['rtype']=='saturday'){ echo 'selected';}} ?> value="saturday">Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Pickup Time</label>
                        <div class="controls">
                            <input type="text" id="pickuptime" value="<?php echo isset($busdata[0])?$busdata[0]['rpickuptime']:''; ?>" name='pickuptime' placeholder="Enter PickUp Time" class="span8">												                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Drop Time</label>
                        <div class="controls">
                            <input type="text" id="droptime" name='droptime' value='<?php echo isset($busdata[0])?$busdata[0]['rdroptime']:''; ?>' placeholder="Enter Drop time" class="span8">												
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Fare</label>
                        <div class="controls">
                            <input type="text" id="fare" name='fare' value='<?php echo isset($busdata[0])?$busdata[0]['rfare']:''; ?>' placeholder="Enter fare" class="span8">												
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Total Seat</label>
                        <div class="controls">
                            <input type="text" id="totalseat" name='totalseat' value='<?php echo isset($busdata[0])?$busdata[0]['rseat']:''; ?>' placeholder="Enter Seats" class="span8">												
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