<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
        <div class="portlet x6">
            <div class="portlet-header"><h4>Manage Booking</h4></div>
            <div class="portlet-content">
		<form action="#" method="post" class="form label-inline">
                    <div class="field">
                        <label>First Name </label> <input id="fname" name="fname" size="50" type="text" class="medium" />
                    </div>
                    <div class="field">
                        <label >Last Name </label> <input id="lname" name="lname" size="50" type="text" class="medium" />
                        <p class="field_help">Field help text.</p>
                    </div>
                    <div class="field phone_field">
                        <label>Telephone</label> 
                        <input id="telephone" size="3" type="text" class="xsmall" /> - <input size="3" type="text" class="xsmall" /> 
                            - <input size="4" type="text" class="xsmall" />
                            <p class="field_help">(###) - ### - ####</p>
                    </div>
                    <div class="field">
			<label>Type </label>
			<select id="type" class="medium" name="">
                            <option selected="selected" value="">Corporate</option>
                            <option value="">Individual</option>
			</select>
                    </div>
                    <div class="controlset field">
			<span class="label">Preferred Location</span>
                        <div class="controlset-pad">
                            <input name="radio" id="radio1" value="1" type="radio" /> <label>Option 1</label><br />
                            <input name="radio" id="radio2" value="2" type="radio" /> <label>Option 2</label><br />
                            <input name="radio" id="radio3" value="3" type="radio" /> <label>Option 3</label><br />
			</div>
                    </div>			
                    <div class="controlset field">
                        <span class="label">Something Else </span>
			<div class="controlset-pad">
                            <input name="option[]" id="check1" value="1" type="checkbox" />  <label>Some Option 1</label><br />
                            <input name="option[]" id="check2" value="2" type="checkbox" />  <label>Some Option 2</label><br />
                            <input name="option[]" id="check3" value="3" type="checkbox" /> <label>Some Option 3</label><br />
                        </div>
                    </div>	
                    <div class="field">
                        <label>Description</label> <textarea rows="7" cols="50" name="description"></textarea>
                    </div>
                    <br />
                    <div class="buttonrow">
			<button class="btn btn-orange">Add</button>
                    </div>
                </form>
                <br /><br />	
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</html>