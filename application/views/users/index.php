<div class="d-flex flex-column align-items-center pt-5">
    <div class="d-flex p-2">
        <form action="http://localhost/index.php/users/index" method="GET">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search.." name="search" value="">
                <div class="input-group-append ">
                    <button type="submit" class="btn btn-success" name="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    
    <table class="table table-bordered table-striped text-center">
        <tr>           
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
        </tr>  
        <?php $i = 1; foreach ($showAllUsers as $value){ ?>                
            <tr>               
                <td><?php echo $i++ ;?></td>

                <td>                                  
                    <a href="http://localhost/index.php/users/callOtherUser/<?php echo $value->id;?>"><?php echo $value->fname.' '.$value->lname; ?></a>                   
                </td>

                <td>
                    <?php
                        $date_corection = $this->date_utills->convertDate($value->date);                       
                        echo date('l jS \of F Y H:i:s', strtotime(str_replace($date_corection, "", $value->date)));
                    ?>
                </td>
            </tr>                
        <?php }  ?>	
    </table>
</div>