
<form action="saveEdit" method="POST" class="p-5">   
    <div class="save">
        <table align="center">
            <tr aling="center">
                <th colspan="2">Personal Information</th>
            </tr>
            <tr>
                <th>User ID</th><td><?php echo $user_info->id; ?></td>
            </tr>
            <tr>
                <th>First Name</th><td><input class="userStyle" type="text" name="fname" value="<?php echo $user_info->fname; ?>"></td>
            </tr>
            <tr>
                <th>Last Name</th><td ><input class="userStyle" type="text" name="lname" value="<?php echo $user_info->lname; ?>"></td>
            </tr>
            <tr>
                <th>Email</th><td><?php echo $user_info->email; ?></td>
            </tr>
            <tr>
                <th>Registration Date</th>
                <td>
                    <?php
                        $date_corection = $this->date_utills->convertDate($user_info->date);                       
                        echo date('l jS \of F Y H:i:s', strtotime(str_replace($date_corection, "", $user_info->date)));                        
                    ?>
                </td>
            </tr>
        </table>
        <div class="d-grid gap-2 col-5 mx-auto">
	<button class="btn btn-primary ">Save</button>
        </div>
    </div>
</form>   

