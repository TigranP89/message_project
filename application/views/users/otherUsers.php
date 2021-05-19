<div class="d-flex flex-column align-items-center pt-5">
    <table align="center">
        <tr aling="center">
            <th colspan="2">Personal Information</th>
        </tr>
        <tr>
            <th>User ID</th><td><?php echo $other_info->id; ?></td>
        </tr>
        <tr>
            <th>First Name</th><td><?php echo $other_info->fname; ?></td>
        </tr>
        <tr>
            <th>Last Name</th><td ><?php echo $other_info->lname; ?></td>
        </tr>
        <tr>
            <th>Email</th><td><?php echo $other_info->email; ?></td>
        </tr>
        <tr>
            <th>Registration Date</th>
            <td>
                <?php
                    
                    $date_corection = $this->date_utills->convertDate($other_info->date);                       
                    echo date('l jS \of F Y H:i:s', strtotime(str_replace($date_corection, "", $other_info->date)));
                ?>
            </td>
        </tr>
    </table>
</div>
<div class="d-flex flex-column align-items-center pt-5">
    <?php foreach ($contents as $value){ ?>            
        <div class="w-75 m-2 p-2 border border-dark">
            <form action="http://localhost/index.php/home/doSomething" method="POST">

                <input type="hidden"  name="id" value="<?php echo $value->id; ?>">
                <article>
                    <snap class="text-center font-italic"><?php echo $value->record; ?></snap>
                </article>
                <div>
                    <snap class="text-center m-3 p-3">
                        (<?php
                            $date_corection = $this->date_utills->convertDate($value->date);                       
                            echo date('l jS \of F Y H:i:s', strtotime(str_replace($date_corection, "", $value->date)));
                        ?>)
                    </snap>
                </div>

                <button type="button" class="btn btn-danger m-2">
                    <i class="bi bi-emoji-smile"></i><snap>&ensp;<?php echo $value->like; ?></snap>
                </button>
            
                <button type="button" class="btn btn-secondary  m-2">
                    <i class="bi bi-emoji-frown"></i><snap>&ensp;<?php echo $value->dislike; ?></snap>
                </button>

                <a href="http://localhost/index.php/message/view/<?php echo $value->id;?>" class="button">View</a>
            </form>
        </div>            
    <?php } ?>
</div>