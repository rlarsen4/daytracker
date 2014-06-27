<?php  ?>
<div>
    <select name="reports" id="reports">
        <option value="0">Reports</option>
        <option value="1">Roster</option>
        <option value="2">Report Card</option>
        <option value="3">Monthly Report Cards</option>
    </select>
    <table>
        <caption>***STATIC ROSTER VIEW***</caption>
        <th>First Name</th><th>LastName</th><th>Scheduled Date</th>
        <tr>
            <td><a href="*">Trent</a></td><td>Gerber</td><td>2014-07-15</td>
        </tr><tr>
            <td>Jubby</td><td>Larlo</td><td>2014-07-15</td>
        </tr><tr>
            <td>Blueberry</td><td>Larsen</td><td>2014-07-15</td>
        </tr>
    </table>
    <br><br>
        <table>
        <caption>***STATIC REPORT CARD VIEW***</caption>
        </table>
    <div>
        Trent Gerber earned .5 credits on [7/25/2014]. 
        <span>
            <input type="checkbox">
            generate 
        </span>
    </div>
    <br><br>
    <table>
        <caption>***STATIC MONTHLY CREDIT REPORT***</caption>
        <th>First Name</th><th>Last Name</th><th>Date Earned</th>
        <tr>
            <td>Chippy</td><td>Gerber</td><td>7/18/2014</td>
        </tr><tr>
            <td>Jubby</td><td>Larlo</td><td>7/31/2014</td>
        </tr>
    </table>
</div>