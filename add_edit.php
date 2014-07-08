<?php  ?>
<div class="search">
    <label for="search">Find:</label>
    <select name="students" id="students">
        <option value="0">Students</option>
        <?php 
            $aStudentManager->buildStudentSelect();
         ?>
    </select>
</div>
<div>
    <div class="first_name">
        <label for="first_name">First Name: </label>
        <input type="text" name="first_name" class="first_name_inp">    
        <span class='first_name_req required inactive'>**First Name required**</span>
    </div>

    <div class="last_name">
        <label for="last_name">Last Name: </label>
        <input type="text" name="last_name" class="last_name_inp">
        <span class='last_name_req required inactive'>**Last Name required**</span>
    </div>

    <div class="date_of_birth">
        <label for="date_of_birth">Date of Birth: </label>
        <input type="text" name="date_of_birth" class="date_of_birth_inp"placeholder="YYYY-MM-DD">
        <span class='date_of_birth_req required inactive'>**Date of birth required**</span>
        <span class='date_of_birth_match required inactive'>**Please enter a valid date**</span>
    </div>

    </div>

    <div class="begin_date">
        <label for="begin_date">Begin Date: </label>
        <input type="text" name="begin_date" class="begin_date_inp" placeholder="YYYY-MM-DD">
        <span class="today">Today</span>
        <span class='begin_date_req required inactive'>**Date of birth required**</span>
        <span class='begin_date_match required inactive'>**Please enter a valid date**</span>
    </div>

    <br>
    <hr>
    <br>

    <div class="tested_date">
        <label for="tested_date">Tested Date: </label>
        <input type="text" name="tested_date" class="tested_date_inp" placeholder="YYYY-MM-DD">
        <span class="today">Today</span>
        <span class='tested_date_match required inactive'>**Please enter a valid date**</span>
    </div>

    <div class="screened_date">
        <label for="screened_date">Screened Date: </label>
        <input type="text" name="screened_date" class="screened_date_inp" placeholder="YYYY-MM-DD">    
        <span class="today">Today</span>
        <span class='screened_date_match required inactive'>**Please enter a valid date**</span>
    </div>

    <div class="report_card_date">
        <label for="report_card_date">Report Card Date: </label>
        <input type="text" name="report_card_date" class="report_card_date_inp" placeholder="YYYY-MM-DD">    
        <span class="today">Today</span>
        <span class='screened_date_match required inactive'>**Please enter a valid date**</span>
    </div>

    <div class="exit_date">
        <label for="exit_date">Exit Date: </label>    
        <input type="text" name="exit_date" class="exit_date_inp" placeholder="YYYY-MM-DD">
        <span class="today">Today</span>
        <span class='exit_date_match required inactive'>**Please enter a valid date**</span>
    </div>

    <span class="buttonPanel">
        <span class="button" id="save">Save</span>
        &nbsp;&nbsp;
        <span class="button" id="new">New</span>
        &nbsp;&nbsp;
        <span class="button" id="cancel">Cancel</span>
    </span>

</div>

