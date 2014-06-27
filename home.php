<?php 
    

 ?>

 <div>
    <table>
        <th>Urgent(3)--pill</th>
        <tr>
            <td>
                <a href="*">Blueberry Larsen needs a report card. 2 days past due.[checkbox]</a>
            </td>
        </tr>
        <th>Monday, July 1</th>
        <?php 
        while ($row = $results->fetch_assoc()) {
         ?>
        <tr> 
            <td>
                <a href="*"><?=$row['first_name']?> needs to be tested. [checkbox]</a>
                <a href="*">Vivian Squirrel needs to be screened. [checkbox]</a>
            </td>
        </tr>
        <?php 
        }
        ?>
        <th>Tuesday, July 2</th>
        <tr>
            <td>
                <a href="*">Chippy Samuel needs to be tested. [checkbox]</a>
            </td>
        </tr>
    </table>

</div>