<div class="d-flex flex-column align-items-center pt-5">
    <div class="d-flex justify-content-center" id="input_button"> 
        <form action="input_button" method="POST"> 	             
            <button class="btn btn-secondary ">Create message</button> 
        </form>        
    </div>   
    <?php foreach ($contents as $value){ ?>
        <div class="w-75 m-2 p-2 border border-dark">
            <div>
                <a href="http://localhost/index.php/users/callOtherUser/<?php echo $value->user_id;?>"><?php echo $value->user_full_name; ?></a>
            </div>
            <article>
                <snap class="text-center font-italic"><?php echo $value->record; ?></snap>
            </article>

            <div>
                <snap class="text-center m-3 p-3">(
                    <?php 
                        $date_corection = $this->date_utills->convertDate($value->date);                       
                        echo date('l jS \of F Y H:i:s', strtotime(str_replace($date_corection, "", $value->date)));
                    ?>)
                </snap>
            </div>

            <button type="submit" class="btn btn-danger m-2" name="submit" value="Submit">
                <i class="bi bi-emoji-smile"></i><snap>&ensp;<?php echo $value->like; ?></snap>
            </button>
            <button type="submit" class="btn btn-secondary  m-2" name="submit" value="Submit">
                <i class="bi bi-emoji-frown"></i><snap>&ensp;<?php echo $value->dislike; ?></snap>
            </button>
            
            <div class="btn btn-danger active m-2" >
                <i class="bi bi-chat-left-text"></i><snap>&ensp;<?php echo $value->comments_count; ?></snap>                    
            </div>
            
            <div>
                <?php 
                    if ($this->session->userdata('userId') !== NULL && $this->session->userdata('userId') == $value->user_id) { 
                ?>
                    <div>                                             
                        <a class="button" href="http://localhost/index.php/home/deletMessage/<?php echo $value->id;?>">Delet</a>
                    </div>
                <?php } else {  ?>
                    <div>

                        <a style="display: none;" class="button" href="http://localhost/index.php/home/deletMessage/<?php echo $value->id;?>">Delet</a>
                    </div>
                <?php } ?>
            </div>
            
            <a href="http://localhost/index.php/message/view/<?php echo $value->id;?>" class="button">View</a>
        </div>
    <?php } ?>   
</div>   


