<div class="d-flex flex-column align-items-center pt-5">    
    <?php foreach ($contents as $value){ ?>           
        <div class="w-75 m-2 p-2 border border-dark">
            <div>
                <a href="http://localhost/index.php/users/callOtherUser/<?php echo $value->user_id;?>"><?php echo $value->user_full_name; ?></a>
            </div>
            <article>
                <snap class="text-center font-italic"><?php echo $value->record; ?></snap>
            </article>
            
            <div>
                <snap class="text-center m-3 p-3">(<?php echo $value->date; ?>)</snap>
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
            
            
            
        </div>
    <?php } ?>
</div>
  
<div class="d-flex flex-column align-items-center pt-5">
    <p style="color: #0dcaf0" class="text-center text-uppercase fs-1 fw-bold text-decoration-underline">COMMENTS</p>
    
    <?php foreach (array_reverse($mess_comm) as $value){ ?>
        
        <div class="w-50 m-1 p-1 border border-dark rounded-3 bg-light">
           
            
            <article>
                <snap class="text-center font-italic"><?php echo $value->content; ?></snap>
            </article>

            <div>
                <snap class="text-center m-3 p-3">(<?php echo $value->date; ?>)</snap>
            </div>
            
            <div class="btn-group" role="group" aria-label="Basic example">
                <form action="http://localhost/index.php/message/commentLike" method="POST">
                    <input type="hidden"  name="message_id" value="<?php echo $value->message_id; ?>">
                    <input type="hidden"  name="id" value="<?php echo $value->id; ?>">    
                    <button type="submit" class="btn btn-danger m-2" name="submit" value="Submit">
                        <i class="bi bi-emoji-smile"></i><snap>&ensp;<?php echo $value->like; ?></snap>
                    </button>
                </form>

                <form action="http://localhost/index.php/message/commentDislike" method="POST">
                    <input type="hidden"  name="message_id" value="<?php echo $value->message_id; ?>">
                    <input type="hidden"  name="id" value="<?php echo $value->id; ?>">
                    <button type="submit" class="btn btn-secondary  m-2" name="submit" value="Submit">
                        <i class="bi bi-emoji-frown"></i><snap>&ensp;<?php echo $value->dislike; ?></snap>
                    </button>                    
                </form>
                
                
                               
            </div>
            
            <div >
                <?php 
                    if ($this->session->userdata('userId') !== NULL && $this->session->userdata('userId') == $value->user_id) { 
                ?>
                    <div>                                             
                        <a class="btn btn-danger p-1 float-end" href="http://localhost/index.php/message/deletComment/<?php echo $value->id;?>">Delet</a>
                    </div>
                <?php } else {  ?>
                    <div>

                        <a style="display: none;" class="btn btn-danger p-1" href="http://localhost/index.php/message/deletComment/<?php echo $value->id;?>">Delet</a>
                    </div>
                <?php } ?>
            </div>
            
            <div>
                <a class="float-start" href="http://localhost/index.php/users/callOtherUser/<?php echo $value->user_id;?>"><?php echo $value->user_full_name; ?></a>
            </div>
        </div>
    <?php } ?>
</div>


    <div class="d-flex justify-content-center p-5" id="input_form">
        <?php foreach ($contents as $value){ ?>
            <?php 
                if ($this->session->userdata('userId') !== NULL) { 
            ?>
                <form  action="http://localhost/index.php/message/user_comment" method="POST">
                    <input type="hidden"  name="id" value="<?php echo $value->id; ?>">
                    <textarea name="comment_text" rows="3" cols="100" class="docket" placeholder="Enter your comment"></textarea></br>             
                    <input type="submit" class="btn btn-success" name="submit" value="Comment On"> 
                </form>
            <?php } else {  ?>
                <form style="display: none;" action="http://localhost/index.php/message/user_comment" method="POST">
                    <input type="hidden"  name="id" value="<?php echo $value->id; ?>">
                    <textarea name="comment_text" rows="3" cols="100" class="docket" placeholder="Enter your comment"></textarea></br>             
                    <input type="submit" class="btn btn-success" name="submit" value="Comment On"> 
                </form>
            <?php } ?>
        <?php } ?>
    </div>



  
